<?php

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

Route::get('/', function () {
    return view('welcome');
});

#validation.php file full path 
#vendor/laravel/src\Illuminate/Translation/lang\en/validation.php

use App\Http\Controllers\formController;

Route::get('/home',[formController::class,'page_open']);

Route::get('/signup',[formController::class, 'form_page']);

Route::post('/submit',[formController::class,'form_submit']);
Route::get('/getall', [formController::class, 'get_all_data'])->name('home');
Route::get('/edit{id}', [formController::class, 'edit_page']);
Route::post('/update', [formController::class, 'form_update']);


