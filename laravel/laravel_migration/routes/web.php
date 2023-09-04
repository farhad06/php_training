<?php

use App\Http\Controllers\formController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(formController::class)->group(function(){
    Route::get('/add',  'show');
    Route::get('showpost',  'show_post');
    Route::post('/submit',  'add_posts');
    Route::get('/editpost{id}','edit_post');
    Route::post('updatepost','update_post');
    Route::get('deletepost{id}', 'delete_post');

});


