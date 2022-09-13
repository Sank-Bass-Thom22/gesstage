<?php

use App\Http\Controllers\Drh\StageController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::middleware('ifdrh')->group(function () {
        Route::get('listestage/{param}', [StageController::class, 'index'])
            ->name('DRHlistestage');

        Route::get('showrequest/{id}', [StageController::class, 'show'])
            ->name('DRHshowrequest');

        Route::post('destroyrequest/{id}', [StageController::class, 'destroy'])
            ->name('DRHdestroyrequest');

        Route::post('DRHinvitation/{id}', [StageController::class, 'invitation'])
            ->name('DRHinvitation');

        Route::post('DRHmaitredestage/{id}', [StageController::class, 'maitredestage'])
            ->name('DRHmaitredestage');

        Route::post('DRHapprobation/{id}', [StageController::class, 'approbation'])
            ->name('DRHapprobation');
    });
});
