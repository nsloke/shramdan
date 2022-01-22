<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin', function () {
    return view('admin');
});


Route::get('/home', function () {
    return view('home');
});



Route::get('/fetchAdminRoles',[AdminAuthController::class,'fetchAdminRoles']);

Route::post('/adminLoginSubmit',[AdminAuthController::class,'loginAdmin']);

