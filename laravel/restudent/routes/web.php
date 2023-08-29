<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\formController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[formController::class,'index']);
Route::get('/register', [formController::class, 'user_registration_page']);
Route::post('/registration', [formController::class, 'user_registration']);
Route::get('/login', [formController::class, 'login_page']);

Route::get('/admin', [adminController::class, 'admin_login_page']);
Route::get('/dashboard', [adminController::class, 'dashboard']);
Route::get('/allusers', [adminController::class, 'get_all_users']);
Route::get('/allfood', [adminController::class, 'get_all_food_items']);





