<?php

use App\Http\Controllers\testController;
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


Route::get('/',[testController::class,'index']);
Route::get('/add',[testController::class,'add']);
Route::post('/submit',[testController::class,'add_user']);
Route::get('/delete{id}', [testController::class, 'delete']);
Route::get('/edit{id}', [testController::class, 'edit']);
Route::post('/update', [testController::class, 'update_user']);

