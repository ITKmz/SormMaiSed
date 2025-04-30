<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function is_logged_in()
    {
        $admin = session('admin');
        if ($admin) {
            if ($admin->role == 'admin') {
                return redirect()->route('d_order');
            } else {
                session()->forget('admin');
                return redirect()->route('dashboard');
            }
        } else {
            return view('admin/employee_login');
        }
    }
    function login(Request $req)
    {
        $data = [
            "username" => $req->username,
            "password" => $req->password,
        ];
        $admin = DB::select(
            'SELECT * 
            FROM employees 
            WHERE employee_username = :username 
            AND employee_password = :password',
            ['username' => $data['username'], 'password' => $data['password']]
        );
        if ($admin) {
            //store employee_id in session
            session(['admin' => $admin[0]]);
            if ($admin[0]->role == 'admin') {
                return redirect()->route('d_order');
            } else {
                return redirect()->route('technician');
            }
        } else {
            // return error message and login page
            return redirect()->route('dashboard')->with('error', 'Invalid username or password');
        }
    }

    function listorder()
    {
        $orders = DB::select(
            'SELECT 
                orders.order_id, 
                customers.customer_name, 
                customers.customer_tel, 
                payments.payment_method, 
                payments.payment_date,
                products.product_id,
                products.product_type,
                products.product_description,
                products.product_status,
                products.employee_id
            FROM 
                orders
            Join 
                customers ON orders.customer_id = customers.customer_id
            JOIN 
                payments ON orders.order_id = payments.order_id
            JOIN 
                products ON orders.order_id = products.order_id
            WHERE 
                orders.is_finished = 0
            ORDER BY
                orders.order_id DESC'
        );
        // query to get the technician name where is_active = 0
        $technicians = DB::select(
            'SELECT 
                employee_id,
                employee_name
            FROM 
                employees
            WHERE 
                role = "technician" 
            AND 
                is_active = 0'
        );
        return view('admin/adminorder', compact('orders', 'technicians'));
    }

    function listtechnician()
    {
        $technicians = DB::select(
            'SELECT 
                employee_id, 
                employee_name, 
                employee_tel,
                department, 
                is_active
            FROM 
                employees
            WHERE
                role = "technician"'
        );

        foreach ($technicians as $technician) {
            $technician->avg_rating = DB::select(
                'SELECT 
                    AVG(feedback_rating) as avg_rating
                FROM 
                    feedbacks
                JOIN 
                    products ON feedbacks.product_id = products.product_id
                WHERE 
                    products.employee_id = :employee_id',
                ['employee_id' => $technician->employee_id]
            )[0]->avg_rating;
            $technician->product_count = DB::select(
                'SELECT 
                    COUNT(product_id) as product_count
                FROM 
                    products
                WHERE 
                    employee_id = :employee_id',
                ['employee_id' => $technician->employee_id]
            )[0]->product_count;
        }
        return view('admin/technician', compact('technicians'));
    }

    public function firedtechnician($id)
    {
        DB::transaction(function () use ($id) {
            DB::statement('UPDATE products SET employee_id = NULL WHERE employee_id = ?', [$id]);

            DB::statement('DELETE FROM employees WHERE employee_id = ?', [$id]);
        });

        return redirect()->route('d_technician');
    }
    // function to assign order that update the product table with the technician id and employee table with is_active = 1

    public function assignorder(Request $req)
    {
        $data = [
            "product_id" => $req->product_id,
            "employee_id" => $req->employee_id,
        ];
        DB::update(
            'UPDATE 
                products
            SET 
                employee_id = :employee_id,
                product_status = "in progress"
            WHERE 
                product_id = :product_id',
            ['employee_id' => $data['employee_id'], 'product_id' => $data['product_id']]
        );
        DB::update(
            'UPDATE 
                employees
            SET 
                is_active = 1
            WHERE 
                employee_id = :employee_id',
            ['employee_id' => $data['employee_id']]
        );
        return redirect()->route('d_order');
    }

    function performance()
    {
        // select order_id latest year
        $besttype = DB::select(
            'SELECT 
                products.product_type,
                MAX(stocks.product_price) AS product_price,
                COUNT(*) AS product_count
            FROM 
                orders
            JOIN 
                products ON orders.order_id = products.order_id
            JOIN
                stocks ON products.product_stock_id = stocks.product_stock_id
            WHERE 
                YEAR(order_time) = YEAR(CURDATE())
            GROUP BY 
                products.product_type
            ORDER BY 
                product_count DESC
            LIMIT 1'
        );
        // get total by product price * product count
        $besttype[0]->total = $besttype[0]->product_price * $besttype[0]->product_count;

        // sum total earning latest year
        $income = DB::select(
            'SELECT
                YEAR(o.order_time) AS year,
                COUNT(DISTINCT o.order_id) AS total_orders,
                SUM(s.product_price) AS total_income
            FROM
                orders o
            JOIN
                products p ON o.order_id = p.order_id
            JOIN
                stocks s ON p.product_stock_id = s.product_stock_id
            WHERE
                YEAR(o.order_time) = YEAR(CURDATE())
            GROUP BY
                YEAR(o.order_time)'
        );
        return view('admin/performance', compact('besttype','income'));
    }
}
