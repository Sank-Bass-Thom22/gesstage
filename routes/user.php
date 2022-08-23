<?php

use App\Http\Controllers\User\NStageController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::middleware('ifuser')->group(function () {
        Route::get('listestage', [NStageController::class, 'index'])
            ->name('listestage');

        Route::get('nstageform/{form}', [NStageController::class, 'create'])
            ->name('nstageform');

        Route::post('addstage', [NStageController::class, 'store'])
            ->name('addstage');

        Route::get('showstage/{id}', [NStageController::class, 'show'])
            ->name('showstage');

        Route::post('editStageForm/{id}{field}', [NStageController::class, 'edit'])
            ->name('editStageForm');

        Route::post('updatestage/{id}{field}', [NStageController::class, 'update'])
            ->name('updatestage');

        Route::post('deletestage/{id}', [NStageController::class, 'destroy'])
            ->name('deletestage');
    });
});
