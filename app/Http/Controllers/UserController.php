<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function getfollows(Request $req)
    {
        $data = [
            "order_id" => $req->order_id,
        ];
        $order_info = DB::table("orders")->where('order_id', $data['order_id'])->first();
        $product_info = DB::table("products")->where('order_id', $data['order_id'])->get();
        // dd($order_info, $product_info);
        return redirect()->route('follow')->with('order_info', $order_info)->with('product_info', $product_info);
    }

    function login(Request $req)
    {
        $data = [
            "username" => $req->username,
            "password" => $req->password,
        ];
        $user = DB::select(
            'SELECT * 
            FROM customers 
            WHERE customer_username = :username 
            AND customer_password = :password',
            ['username' => $data['username'], 'password' => $data['password']]
        );
        if ($user) {
            //store customer_id in session
            session(['user' => $user[0]]);
            return redirect()->route('index');
        } else {
            // return error message and login page
            return redirect()->route('signin')->with('error', 'Invalid username or password');
        }
    }

    function logout($role)
    {
        if ($role == 'admin') {
            session()->forget('admin');
            return redirect()->route('dashboard');
        } else if ($role == 'user') {
            session()->forget('user');
            return redirect()->route('index');
        }

    }

    function maintain()
    {
        if (session('user')) {
            return view('customer/maintain');
        } else {
            return redirect()->route('signin');
        }
    }

    function listwaitpayment()
    {
        $query = DB::select(
            'SELECT 
                products.*, 
                orders.order_time,
                stocks.product_price
            FROM 
                customers
            JOIN 
                orders ON customers.customer_id = orders.customer_id
            JOIN 
                payments ON orders.order_id = payments.order_id
            JOIN 
                products ON orders.order_id = products.order_id
            JOIN
                stocks ON products.product_stock_id = stocks.product_stock_id
            WHERE 
                customers.customer_id = :customer_id
                AND payments.is_paid = 0
            ORDER BY
                orders.order_time DESC',
            ['customer_id' => session('user')->customer_id]
        );

        $data = [];
        foreach ($query as $d) {
            if (!isset($data[$d->order_id])) {
                $data[$d->order_id] = [];
            }
            $data[$d->order_id][] = $d;
        }

        foreach ($data as $row) {
            $row[0]->total_price = DB::select(
                'SELECT 
                    SUM(product_price) as total_price
                FROM 
                    products
                JOIN
                    stocks ON products.product_stock_id = stocks.product_stock_id
                WHERE 
                    order_id = :order_id',
                ['order_id' => $row[0]->order_id]
            )[0]->total_price;
        }
        return view('customer/waitpayment', compact('data'));
    }

    function paynow($id)
    {
        DB::update(
            'UPDATE 
                payments
            SET 
                is_paid = 1
            WHERE 
                order_id = :order_id',
            ['order_id' => $id]
        );
        return redirect()->route('waitpayment');
    }

    function cancel($id)
    {
        DB::delete(
            'DELETE FROM 
                orders
            WHERE 
                order_id = :order_id',
            ['order_id' => $id]
        );
        return redirect()->route('waitpayment');
    }

    function listorder()
    {
        $query = DB::select(
            'SELECT 
                products.*, 
                orders.order_time,
                stocks.product_price
            FROM 
                customers
            JOIN 
                orders ON customers.customer_id = orders.customer_id
            JOIN 
                payments ON orders.order_id = payments.order_id
            JOIN 
                products ON orders.order_id = products.order_id
            JOIN
                stocks ON products.product_stock_id = stocks.product_stock_id
            WHERE 
                customers.customer_id = :customer_id
                AND payments.is_paid = 1 
            ORDER BY
                orders.order_time DESC',
            ['customer_id' => session('user')->customer_id]
        );
        $data = [];
        foreach ($query as $d) {
            if (!isset($data[$d->order_id])) {
                $data[$d->order_id] = [];
            }
            $data[$d->order_id][] = $d;
        }
        foreach ($data as $row) {
            $row[0]->total_price = DB::select(
                'SELECT 
                    SUM(product_price) as total_price
                FROM 
                    products
                JOIN
                    stocks ON products.product_stock_id = stocks.product_stock_id
                WHERE 
                    order_id = :order_id',
                ['order_id' => $row[0]->order_id]
            )[0]->total_price;
        }
        return view('customer/orders', compact('data'));
    }


    function insert(Request $req)
    {
        $input = [
            'type' => $req->type,
            'detail' => $req->detail,
        ];


        foreach ($input['type'] as $index => $type) {
            $data[$index] = [
                'product_type' => $type,
                'product_description' => $input['detail'][$index],
            ];
        }

        DB::transaction(function () use ($req, $data) {
            DB::insert('
                INSERT INTO orders (customer_id, order_time)
                VALUES (:customer_id, NOW())',
                ['customer_id' => $req->customer_id]
            );

            $orderId = DB::getPdo()->lastInsertId();

            DB::insert('
                INSERT INTO payments (order_id, payment_method, payment_date)
                VALUES (:order_id, :payment_method, NOW())',
                [
                    'order_id' => $orderId,
                    'payment_method' => $req->payment_method
                ]
            );

            foreach ($data as $i) {
                $product_stock_id = DB::select('
                    SELECT product_stock_id
                    FROM stocks
                    WHERE product_name = :product_name',
                    ['product_name' => $i['product_type']]
                )[0]->product_stock_id;

                DB::insert('
                    INSERT INTO products (order_id, product_type, product_description, product_stock_id, product_status)
                    VALUES (:order_id, :product_type, :product_description, :product_stock_id, :product_status)',
                    [
                        'order_id' => $orderId,
                        'product_type' => $i['product_type'],
                        'product_description' => $i['product_description'],
                        'product_stock_id' => $product_stock_id,
                        'product_status' => 'In Progress',
                    ]
                );
            }
        });

        return response()->json(['message' => 'Order created successfully'], 201);
    }
}
