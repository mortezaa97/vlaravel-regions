<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Mortezaa97\Regions\Http\Controllers\CountryController;
use Mortezaa97\Regions\Http\Controllers\CountyController;
use Mortezaa97\Regions\Http\Controllers\ProvinceController;

Route::prefix('api/counties')->middleware('api')->group(function () {
    Route::get('/', [CountyController::class, 'index'])->name('counties.index');
    Route::get('/index/{province?}/{county?}', [CountyController::class, 'index'])->name('counties.province');
    Route::get('/{county}', [CountyController::class, 'show'])->name('counties.show');
});

Route::prefix('api/provinces')->middleware('api')->group(function () {
    Route::get('/', [ProvinceController::class, 'index'])->name('provinces.index');
    Route::get('/{province}', [ProvinceController::class, 'show'])->name('provinces.show');
});

Route::prefix('api/countries')->middleware('api')->group(function () {
    Route::get('/', [CountryController::class, 'index'])->name('countries.index');
    Route::get('/{country}', [CountryController::class, 'show'])->name('countries.show');
});
