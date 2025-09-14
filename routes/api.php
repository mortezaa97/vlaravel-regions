<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Mortezaa97\Regions\Http\Controllers\CountyController;

Route::prefix('api/counties')->group(function () {
    Route::get('/', [CountyController::class, 'index'])->name('counties.index');
    Route::get('/index/{province?}/{county?}', [CountyController::class, 'index'])->name('counties.province');
    Route::get('/{county}', [CountyController::class, 'show'])->name('counties.show');
});
