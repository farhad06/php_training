<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\formController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

#View index page i.e home page
Route::get('/', [formController::class, 'index']);
#User registration 
Route::get('/register', [formController::class, 'user_registration_page']);
Route::post('/registration', [formController::class, 'user_registration']);
#user login and logout
Route::get('/login', [formController::class, 'login_page']);
Route::post('/user_login', [formController::class, 'login']);
Route::get('/user_logout', [formController::class, 'logout']);
#booking 
Route::post('/booking', [formController::class, 'book_restrudent']);
#update profile
Route::get('/user_profile{id}', [formController::class, 'user_profile'])->name('user.profile');
Route::post('/update_basic_info', [formController::class, 'update_user_basic_info']);
Route::post('/update_photo', [formController::class, 'update_user_photo']);
Route::post('/update_password', [formController::class, 'update_user_password']);

########################################################################

Route::get('/admin', [adminController::class, 'admin_login_page']);
Route::post('/admin_login', [adminController::class, 'login']);
Route::get('/admin_logout', [adminController::class, 'logout']);
Route::get('/dashboard', [adminController::class, 'dashboard']);
#Route for users
Route::get('/allusers', [adminController::class, 'get_all_users']);
Route::get('/deleteuser{id}', [adminController::class, 'delete_user']);
#Route for food items
Route::get('/allfood', [adminController::class, 'get_all_food_items']);
Route::post('/additem', [adminController::class, 'add_items']);
Route::get('/edititem{id}', [adminController::class, 'edit_item']);
Route::post('/updateitem', [adminController::class, 'update_item']);
Route::get('/deleteitem{id}', [adminController::class, 'delete_item']);
#Route for booking
Route::get('/getbooking', [adminController::class, 'get_all_booking']);
Route::get('/deletebooking{id}', [adminController::class, 'delete_booking']);
#Route for chefs
Route::get('/getchef', [adminController::class, 'get_all_chef']);
Route::post('/addchef', [adminController::class, 'add_chef']);
Route::get('/editchef{id}', [adminController::class, 'edit_chef']);
Route::post('/updatechef', [adminController::class, 'update_chef']);
Route::get('/deletechef{id}', [adminController::class, 'delete_chef']);
