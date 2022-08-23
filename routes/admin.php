<?php

use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\DrhController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::middleware('ifadmin')->group(function () {
        Route::get('listeservice', [ServiceController::class, 'index'])
            ->name('listeservice');

        Route::get('serviceform', [ServiceController::class, 'create'])
            ->name('serviceform');

        Route::post('addservice', [ServiceController::class, 'store'])
            ->name('addservice');

        Route::post('editserviceform/{id}', [ServiceController::class, 'edit'])
            ->name('editserviceform');

        Route::post('updateservice/{id}', [ServiceController::class, 'update'])
            ->name('updateservice');

        Route::post('deleteservice/{id}', [ServiceController::class, 'destroy'])
            ->name('deleteservice');

        Route::get('listeagent', [AgentController::class, 'index'])
            ->name('listeagent');

        Route::get('agentform', [AgentController::class, 'create'])
            ->name('agentform');

        Route::post('addagent', [AgentController::class, 'store'])
            ->name('addagent');

        Route::get('showagent/{id}', [AgentController::class, 'show'])
            ->name('showagent');

        Route::post('editagentform/{id}', [AgentController::class, 'edit'])
            ->name('editagentform');

        Route::post('updateagent/{id}', [AgentController::class, 'update'])
            ->name('updateagent');

        Route::post('deleteagent/{id}', [AgentController::class, 'destroy'])
            ->name('deleteagent');

        Route::get('listedrh', [DrhController::class, 'index'])
            ->name('listedrh');

        Route::get('drhform', [DrhController::class, 'create'])
            ->name('drhform');

        Route::get('showdrh/{id}', [DrhController::class, 'show'])
            ->name('showdrh');

            Route::post('registerdrh', [DrhController::class, 'store'])
            ->name('registerdrh');

            Route::post('updatedrh/{id}', [DrhController::class, 'update'])
            ->name('updatedrh');

            Route::post('deletedrh/{id}', [DrhController::class, 'destroy'])
            ->name('deletedrh');
    });
});
