<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\IncomeEntryController;
use App\Http\Controllers\Api\AssetEntryController;
use App\Http\Controllers\Api\V1\FinancialAssetController;
use App\Http\Controllers\Api\V1\AssetEntries\AgriNonAgriLandController;

// Auth routes with 'auth:api' middleware applied where necessary
Route::group(['prefix' => 'auth', 'middleware' => 'api'], function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
    Route::patch('/profile-update/{user}', [UserController::class, 'update'])->name('profile.update');
});

// Income and Asset routes
Route::middleware('api')->group(function () {
    // Income entries
    Route::get('/income-entries', [IncomeEntryController::class, 'index']);
    Route::get('/income-entries/{userId}', [IncomeEntryController::class, 'show']);
    Route::post('/income-entries', [IncomeEntryController::class, 'store']);
    Route::patch('/income-entries/{id}', [IncomeEntryController::class, 'update']);
    Route::delete('/income-entries/{id}', [IncomeEntryController::class, 'destroy']);
    
    // Asset entries
    // Route::get('/assets-entries', [\App\Http\Controllers\Api\AssetEntryController::class, 'index'])->name('asset-entries');
    // Route::post('/assets-entries', [\App\Http\Controllers\Api\AssetEntryController::class, 'store'])->name('asset-entries');
    // Route::patch('/assets-entries/{id}', [\App\Http\Controllers\Api\AssetEntryController::class, 'update'])->name('assets-entries');
    // Route::delete('/assets-entries/{id}', [\App\Http\Controllers\Api\AssetEntryController::class, 'destroy'])->name('assets-entries');


    Route::get('/agri-non-agri-lands', [AgriNonAgriLandController::class, 'index']);
    Route::post('/agri-non-agri-lands', [AgriNonAgriLandController::class, 'storeOrUpdate']);
    Route::delete('/agri-non-agri-lands/{id}', [AgriNonAgriLandController::class, 'destroy']);

    Route::get('/financial-assets', [FinancialAssetController::class, 'index']);
    Route::post('/financial-assets', [FinancialAssetController::class, 'storeOrUpdate']);
    Route::delete('/financial-assets/{id}', [FinancialAssetController::class, 'destroy']);
});
