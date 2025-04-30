<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('follow', function () {
    return view('follow');
})->name('follow');

Route::post('follow', [UserController::class,'getfollows']);


Route::get('signin', function () {
    return view('user_login');
})->name('signin');

Route::post('signin', [UserController::class,'login']);

Route::get('signout/{role}', [UserController::class,'logout'])->name('signout');

Route::get('maintain', [UserController::class,'maintain'])->name('maintain');

Route::post('submitmaintain', [UserController::class,'insert'])->name('submitmaintain');

Route::get('customer/orders', [UserController::class,'listorder'])->name('orders');

Route::get('customer/waitpayment', [UserController::class,'listwaitpayment'])->name('waitpayment');

Route::get('paynow/{id}', [UserController::class,'paynow'])->name('paynow');

Route::get('cancel/{id}', [UserController::class,'cancel'])->name('cancel');

Route::get('dashboard', [AdminController::class,'is_logged_in'])->name('dashboard');

Route::post('dashboard', [AdminController::class,'login']);

Route::get('dashboard/order', [AdminController::class,'listorder'])->name('d_order');

Route::get('dashboard/info/technician', [AdminController::class,'listtechnician'])->name('d_technician');

Route::get('firedtechnician/{id}', [AdminController::class,'firedtechnician'])->name('firedtechnician');

Route::get('dashboard/info/customer', function () {
    return view('admin/customer');
})->name('d_customer');

Route::get('dashboard/performance', [AdminController::class,'performance'])->name('d_performance');

Route::get('assignorder', [AdminController::class,'assignorder'])->name('assignorder');

Route::get('dashboard/assignment/completed', function () {
    return view('technician/completed_assignment');
})->name('completed');

Route::get('dashboard/assignment/inprogress', function () {
    return view('technician/inprogress_assignment');
})->name('inprogress');

Route::get('test', function () {
    return view('payment');
})->name('test');


