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

Route::get('addWorkSystem', function () {
    return view('addworksystem');
});

Route::get('deleteWorkSystem', function () {
    return view('deleteworksystem');
});


Route::get('addWorkTypeSystem', function () {
    return view('addworktypesystem');
});

Route::get('deleteWorkTypeSystem', function () {
    return view('deleteworktypesystem');
});





Route::get('addMaterialSystem', function () {
    return view('addmaterialsystem');
});

Route::get('deleteMaterialSystem', function () {
    return view('deletematerialsystem');
});


Route::get('addMaterialTypeSystem', function () {
    return view('addMaterialTypeSystem');
});

Route::get('deleteMaterialTypeSystem', function () {
    return view('deletematerialtypesystem');
});

Route::get('reportmaker',function () {
    return view('reportmakersys');
});




Route::get('addEquipmentSystem', function () {
    return view('addequipmentsystem');
});

Route::get('deleteEquipmentSystem', function () {
    return view('deleteequipmentsystem');
});




Route::get('addEquipmentTypeSystem', function () {
    return view('addequipmenttypesystem');
});

Route::get('deleteEquipmentTypeSystem', function () {
    return view('deleteequipmenttypesystem');
});






Route::post('/logoutAdmin',[AdminAuthController::class,'logoutAdmin']);

Route::get('/fetchAdminRoles',[AdminAuthController::class,'fetchAdminRoles']);

Route::post('/adminLoginSubmit',[AdminAuthController::class,'loginAdmin']);









Route::post('/deleteWorkType',[WorksController::class,'deleteWorkType']);

Route::post('/deleteMaterials',[MaterialsController::class,'deleteMaterials']);

Route::post('/deleteEquipments',[EquipmentsController::class,'deleteEquipments']);