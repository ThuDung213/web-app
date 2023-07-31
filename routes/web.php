<?php

use App\Http\Controllers\Front\Creator\WorkingTimeController;
use App\Http\Controllers\Front\Creator\CreatorController;
use App\Http\Controllers\Front\Creator\ProfileController;
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

Auth::routes(['verify' => true]);

// User Route
Route::middleware(['auth','client'])->group(function () {
    Route::get("/client/home", [App\Http\Controllers\Front\Client\ClientController::class, 'index'])->name('home.client');
    Route::post("/client/home/search", [App\Http\Controllers\Front\Client\ClientController::class, 'search'])->name('home.client.search');
});

// Creator Route
Route::middleware(['auth','creator'])->prefix('creator')->group(function () {
    Route::get("/home", [CreatorController::class, 'index'])->name('home.creator');

    //Working Time
    Route::get("{creator}/assign/{project}/manhours", [WorkingTimeController::class, 'index'])->name('time.index');
    Route::post("{creator}/project/{project}/working-time", [WorkingTimeController::class, 'store'])->name('time.store');
    Route::patch("working-time/update/{id}", [WorkingTimeController::class, 'update'])->name('time.update');
    Route::delete("working-time/destroy/{id}", [WorkingTimeController::class, 'destroy'])->name('time.destroy');

    // Profile
    Route::get("profile", [ProfileController::class, 'index'])->name('profile.index');
    Route::get("profile/{profile}/edit", [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post("profile/update/{id}", [ProfileController::class, 'update'])->name('profile.update');
});

// Admin Route
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::prefix('home')->group(function () {
        Route::get('', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('home.admin');
    });
    Route::resource('/project', App\Http\Controllers\Admin\ProjectController::class)->names([
        'index' => 'admin.project.index',
        'create' => 'admin.project.create',
        'show' => 'admin.project.show',
        'edit' => 'admin.project.edit',
        'update' => 'admin.project.update',
        'destroy' => 'admin.project.destroy',
    ]);
    //assign members
    Route::post('/project/{id}/member', [App\Http\Controllers\Admin\ProjectController::class, 'addMember'])->name('admin.project.addMember');
    Route::post('project/{project}/delete-member/{creator}', [App\Http\Controllers\Admin\ProjectController::class, 'deleteMember'])->name('admin.project.deleteMember');
    // Search working hours
    Route::post('/project/{project}/search', [App\Http\Controllers\Admin\ProjectController::class, 'search'])->name('admin.project.search');


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

    Route::resource('/client',App\Http\Controllers\Admin\ClientController::class)->names([
        'index' => 'admin.client.index',
        'create' => 'admin.client.create',
        'store' => 'admin.client.store',
        'show' => 'admin.client.show',
        'edit' => 'admin.client.edit',
        'update' => 'admin.client.update',
        'destroy' => 'admin.client.destroy',
    ]);;

    Route::get('/creators', [App\Http\Controllers\Admin\CreatorController::class, 'index'])->name('admin.creator.index');
    Route::get('/creators/{creator}', [App\Http\Controllers\Admin\CreatorController::class, 'show'])->name('admin.creator.show');
    Route::post('/creators/{creator}/search', [App\Http\Controllers\Admin\CreatorController::class, 'search'])->name('admin.creator.search');
});

