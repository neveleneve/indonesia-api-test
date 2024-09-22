<?php

use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RegencyController;
use App\Http\Controllers\VillageController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Provinsi
Route::get('province', [ProvinceController::class, 'index']);
Route::get('province/{province_id}', [ProvinceController::class, 'get']);
Route::get('province/{province_id}/regencies', [ProvinceController::class, 'get_regencies']);

// Kota / Kabupaten
Route::get('regency', [RegencyController::class, 'index']);
Route::get('regency/{regency_id}', [RegencyController::class, 'get']);
Route::get('regency/{regency_id}/districts', [RegencyController::class, 'get_districts']);

// Kecamatan
Route::get('district', [DistrictController::class, 'index']);
Route::get('district/{district_id}', [DistrictController::class, 'get']);
Route::get('district/{district_id}/villages', [DistrictController::class, 'get_villages']);

// Kelurahan
Route::get('village', [VillageController::class, 'index']);
Route::get('village/{village_id}', [VillageController::class, 'get']);
