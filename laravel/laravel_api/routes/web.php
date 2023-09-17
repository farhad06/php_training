<?php

use App\Http\Controllers\apiController;
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

Route::get('httpClientRes',[apiController::class, 'http_client_response']);
Route::get('login',[apiController::class, 'login_page']);
Route::post('loggedin',[apiController::class, 'login']);
// Route::get('getstudent', [apiCrudController::class, 'get_students']);
