<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return view('welcome');
});

Auth::routes();
// User Route
Route::middleware(['auth', 'user-role:user'])->group(function () {
    Route::get("/home", [HomeController::class, 'userHome'])->name('home');
});

// Editor Route
Route::middleware(['auth', 'user-role:editor'])->group(function () {
    Route::get("/editor/home", [HomeController::class, 'editorHome'])->name('home.editor');
});

// Admin Route
Route::prefix('admin')->middleware(['auth', 'user-role:admin'])->group(function () {
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

