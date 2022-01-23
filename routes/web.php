<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\WorksController;
use App\Http\Controllers\EquipmentsController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ShramdataController;
use App\Http\Controllers\MaterialsController;

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


Route::get('/addSupervisorSystem', function () {
    return view('addsupervisor');
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
    return view('addmaterialtypesystem');
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




Route::get('/fetchAllMaterialsType',[MaterialsController::class,'fetchAllMaterialsTypeWeb']);

Route::get('/fetchAllEquipmentsType',[EquipmentsController::class,'fetchAllEquipmentsTypeWeb']);



Route::get('/fetchWorks',[WorksController::class,'fetchWorksSys']);


Route::post('/logoutAdmin',[AdminAuthController::class,'logoutAdmin']);

Route::get('/logout',[AdminAuthController::class,'logout']);


Route::get('/fetchAdminRoles',[AdminAuthController::class,'fetchAdminRoles']);

Route::post('/adminLoginSubmit',[AdminAuthController::class,'loginAdmin']);



Route::post('/saveadmusr',[AdminAuthController::class,'saveadmusr']);

Route::post('/saveWorkWeb',[WorksController::class,'saveWorkWeb']);

Route::post('/saveWorkTypeWeb',[WorksController::class,'saveWorkTypeWeb']);



Route::post('/saveMaterials',[MaterialsController::class,'saveMaterialsWeb']);

Route::post('/saveEquipments',[EquipmentsController::class,'saveEquipmentsWeb']);

Route::post('/saveMaterialsType',[MaterialsController::class,'saveMaterialsTypeWeb']);

Route::post('/saveEquipmentType',[EquipmentsController::class,'saveEquipmentTypeWeb']);




Route::post('/deleteWorkType',[WorksController::class,'deleteWorkType']);

Route::post('/deleteMaterials',[MaterialsController::class,'deleteMaterials']);

Route::post('/deleteEquipments',[EquipmentsController::class,'deleteEquipments']);