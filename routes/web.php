<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Manager\ManagerDashboardController;
use App\Http\Controllers\Manager\ManagerDatasetController;
use App\Http\Controllers\Manager\ManagerTaskController;
use App\Http\Controllers\Analyst\AnalystDashboardController;
use App\Http\Controllers\Analyst\AnalystTaskController;
use App\Http\Controllers\Analyst\AnalystReportController;
use App\Http\Controllers\Manager\ManagerAiInsightController;
use App\Http\Controllers\Manager\ManagerReportController;

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Change here
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('departments', DepartmentController::class);
        Route::resource('users',UserController::class);
    });
Route::middleware(['auth', 'manager'])
    ->prefix('manager')
    ->name('manager.')
    ->group(function () {

        Route::get('/dashboard', [ManagerDashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('datasets', ManagerDatasetController::class);

        Route::get('datasets/{dataset}/download',
            [ManagerDatasetController::class, 'download'])
            ->name('datasets.download');

        Route::get('datasets/{dataset}/analytics',
            [ManagerDatasetController::class, 'analytics'])
            ->name('datasets.analytics');

        Route::resource('tasks', ManagerTaskController::class);

       Route::get('/ai-insights', [ManagerAiInsightController::class, 'index'])
    ->name('ai-insights.index');

Route::get('/ai-insights/{dataset}', [ManagerAiInsightController::class, 'show'])
    ->name('ai-insights.show');

        Route::post('/ai-insights/{dataset}/generate',
            [ManagerAiInsightController::class, 'generate'])
            ->name('ai-insights.generate');
              Route::resource('reports', ManagerReportController::class)->only([
        'index',
        'show'
    ]);

    Route::patch('reports/{report}/approve', [ManagerReportController::class, 'approve'])
        ->name('reports.approve');

    Route::patch('reports/{report}/reject', [ManagerReportController::class, 'reject'])
        ->name('reports.reject');
    });


Route::middleware(['auth', 'analyst'])
    ->prefix('analyst')
    ->name('analyst.')
    ->group(function () {

        // Change here
        Route::get('/dashboard', [AnalystDashboardController::class, 'index'])
            ->name('dashboard');
              Route::resource('tasks', AnalystTaskController::class)
            ->only(['index', 'show', 'edit', 'update']);
            Route::get('/datasets/{dataset}/analytics', [AnalystDatasetController::class,'analytics'])
    ->name('datasets.analytics');
    Route::resource('reports', AnalystReportController::class);
    });

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth','manager'])
    ->prefix('manager')
    ->name('manager.')
    ->group(function () {

        Route::get('/dashboard',[ManagerDashboardController::class,'index'])
            ->name('dashboard');

        Route::resource('datasets', ManagerDatasetController::class);

        Route::resource('tasks', ManagerTaskController::class);
        Route::resource('ai-insights', ManagerAiInsightController::class)
    ->only(['index','show']);
    Route::post('/ai-insights/{dataset}/generate',
    [ManagerAiInsightController::class, 'generate'])
    ->name('ai-insights.generate');

});

require __DIR__.'/auth.php';