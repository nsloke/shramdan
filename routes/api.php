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


Route::get('/fetchWorks',[WorksController::class,'fetchWorks']);

Route::get('/fetchWorkType',[WorksController::class,'fetchWorkType']);

Route::get('/fetchWorksById',[WorksController::class,'fetchWorksById']);



Route::get('/fetchMaterialsByType',[MaterialsController::class,'fetchMaterialsByType']);

Route::get('/fetchMaterialsByWork',[MaterialsController::class,'fetchMaterialsByWork']);



Route::get('/fetchEquipmentsByType',[EquipmentsController::class,'fetchEquipmentsByType']);

Route::get('/fetchEquipmentsByWork',[EquipmentsController::class,'fetchEquipmentsByWork']);








Route::post('/saveWork',[WorksController::class,'saveWork']);

Route::post('/saveWorkType',[WorksController::class,'saveWorkType']);

Route::post('/saveMaterials',[MaterialsController::class,'saveMaterials']);

Route::post('/saveEquipments',[EquipmentsController::class,'saveEquipments']);



