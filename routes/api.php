<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\EquipmentsController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ShramdataController;
use App\Http\Controllers\WorksController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/fetchAdminRoles',[AdminAuthController::class,'fetchAdminRoles']);


Route::get('/fetchWorks',[WorksController::class,'fetchWorks']);

Route::get('/fetchWorkType',[WorksController::class,'fetchWorkType']);

Route::get('/fetchWorksById',[WorksController::class,'fetchWorksById']);

Route::get('/fetchWorkProgressById',[WorksController::class,'fetchWorkProgressById']);

Route::get('/fetchWorkProgressByIdStatus',[WorksController::class,'fetchWorkProgressByIdStatus']);


Route::get('/fetchAllMaterialsType',[MaterialsController::class,'fetchAllMaterialsType']);

Route::get('/fetchAllMaterials',[MaterialsController::class,'fetchAllMaterials']);

Route::get('/fetchMaterialsByType',[MaterialsController::class,'fetchMaterialsByType']);

Route::get('/fetchMaterialsByWork',[MaterialsController::class,'fetchMaterialsByWork']);


Route::get('/fetchAllEquipments',[EquipmentsController::class,'fetchAllEquipments']);

Route::get('/fetchEquipmentsByType',[EquipmentsController::class,'fetchEquipmentsByType']);

Route::get('/fetchEquipmentsByWork',[EquipmentsController::class,'fetchEquipmentsByWork']);



Route::get('/fetchShramdataInfo',[ShramdataController::class,'fetchShramdataInfo']);

Route::get('/fetchShramdataWorkLogByWorkId',[ShramdataController::class,'fetchShramdataWorkLogByWorkId']);



Route::post('/saveWork',[WorksController::class,'saveWork']);

Route::post('/saveWorkType',[WorksController::class,'saveWorkType']);

Route::post('/saveMaterials',[MaterialsController::class,'saveMaterials']);

Route::post('/saveMaterialsType',[MaterialsController::class,'saveMaterialsType']);

Route::post('/saveEquipments',[EquipmentsController::class,'saveEquipments']);

Route::post('/saveShramdataInfo',[ShramdataController::class,'saveShramdataInfo']);

Route::post('/saveadmusrapi',[AdminAuthController::class,'saveadmusrapi']);


Route::post('/assignWorkShramdata',[ShramdataController::class,'assignWorkShramdata']);

Route::post('/setShramdataWorkStartTime',[ShramdataController::class,'setShramdataWorkStartTime']);

Route::post('/setShramdataWorkEndTime',[ShramdataController::class,'setShramdataWorkEndTime']);


Route::post('/workprogressupd',[WorksController::class,'workprogressupd']);





Route::post('/deleteWorkTypeApi',[WorksController::class,'deleteWorkTypeApi']);

Route::post('/deleteMaterialsApi',[MaterialsController::class,'deleteMaterialsApi']);

Route::post('/deleteEquipmentsApi',[EquipmentsController::class,'deleteEquipmentsApi']);




Route::post('/editWork',[WorksController::class,'editWork']);

Route::post('/editWorkType',[WorksController::class,'editWorkType']);

Route::post('/editMaterials',[MaterialsController::class,'editMaterials']);

Route::post('/editEquipments',[EquipmentsController::class,'editEquipments']);

Route::post('/editShramdataInfo',[ShramdataController::class,'editShramdataInfo']);



Route::post('/loginAdminApi',[AdminAuthController::class,'loginAdminApi']);

