<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Front\ProjectController;
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
    Route::get("/home", [AdminController::class, 'index'])->name('home.admin');

    Route::prefix('project')->group(function () {
        Route::get('/create', [ProjectController::class, 'create'])-> name('project.create');
    });
});

