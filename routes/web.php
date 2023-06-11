<?php

use App\Http\Controllers\Front\Client\ClientController;
use App\Http\Controllers\Front\Creator\WorkingTimeController;
use App\Http\Controllers\Front\Creator\CreatorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
});

Auth::routes();
// User Route
Route::middleware(['auth','client'])->group(function () {
    Route::get("/client/home", [ClientController::class, 'index'])->name('home.client');
});

// Editor Route
Route::middleware(['auth','creator'])->prefix('creator')->group(function () {
    Route::get("/home", [CreatorController::class, 'index'])->name('home.creator');

    Route::get("{creator}/assign/{project}/manhours", [WorkingTimeController::class, 'index'])->name('time.index');
    Route::post("{creator}/project/{project}/working-time", [WorkingTimeController::class, 'store'])->name('time.store');
    Route::patch("working-time/update/{id}", [WorkingTimeController::class, 'update'])->name('time.update');
});

// Admin Route
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::prefix('home')->group(function () {
        Route::get('', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('home.admin');
    });
    // Route::prefix('project')->group(function () {
    //     Route::get('/create', [ProjectController::class, 'create'])-> name('project.create');
    // });
    Route::resource('/project', App\Http\Controllers\Admin\ProjectController::class)->names([
        'index' => 'admin.project.index',
        'create' => 'admin.project.create',
        'show' => 'admin.project.show',
        'edit' => 'admin.project.edit',
        'update' => 'admin.project.update',
        'destroy' => 'admin.project.destroy',
    ]);
    Route::resource('/task', App\Http\Controllers\Admin\TaskController::class)->names([
        'index' => 'admin.task.index',
        'create' => 'admin.task.create',
        // 'store' => 'admin.task.store',
        'show' => 'admin.task.show',
        'edit' => 'admin.task.edit',
        'update' => 'admin.task.update',
        'destroy' => 'admin.task.destroy',
    ]);
    Route::post('/project/{project}/task', [App\Http\Controllers\Admin\TaskController::class, 'store'])->name('admin.task.store');


});

