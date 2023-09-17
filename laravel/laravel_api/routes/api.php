<?php

use App\Http\Controllers\apiCrudController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getstudent',[apiCrudController::class,'get_students']);
Route::get('login',[apiCrudController::class, 'login_page']);
//Route::post('loggedin',[apiCrudController::class,'login']);