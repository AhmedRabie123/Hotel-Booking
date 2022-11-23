<?php

use Illuminate\Support\Facades\Route;


/* Admin Route */
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;




// Route::get('/', function () {
//     return view('welcome');
// });


/* Admin Home Route */
route::get('admin/home', [AdminHomeController::class, 'index'])->name('admin_home')->middleware('admin:admin');

/* Admin Login Route */
route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
route::post('admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
route::get('admin/logout', [AdminLoginController::class, 'admin_logout'])->name('admin_logout')->middleware('admin:admin');
route::get('admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
