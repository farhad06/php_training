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

// Route::get('/', function () {
//     return view('welcome');
// });

#validation.php file full path 
#vendor/laravel/src\Illuminate/Translation/lang\en/validation.php

use App\Http\Controllers\formController;

use App\Http\Controllers\crudController;
use App\Http\Controllers\testController;

// Route::get('/home',[formController::class,'page_open']);

// Route::get('/signup',[formController::class, 'form_page']);

// Route::post('/submit',[formController::class,'form_submit']);
// Route::get('/getall', [formController::class, 'get_all_data'])->name('home');
// Route::get('/edit{id}', [formController::class, 'edit_page']);
// Route::post('/update', [formController::class, 'form_update']);


#########################################################################################

Route::get('/',[crudController::class,'form_show']);
Route::post('/add',[crudController::class,'add_player']);
Route::get('/showPlayer', [crudController::class, 'show_all_player']);
Route::get('/edit_player{id}',[crudController::class, 'edit_player'])->name('edit.user');
Route::post('/update_player', [crudController::class, 'update_player']);
Route::get('/delete_player/{id}',[crudController::class, 'delete_player']);


Route::controller(testController::class)->group(function(){
    Route::get('/addtest','test');
    Route::post('/submit','add_test');
    Route::post('/update','update_test');
    Route::get('/gettest','test_data');
    Route::get('/deletepost{id}','delete_post');
    Route::get('/editpost{id}','edit_post');
});

