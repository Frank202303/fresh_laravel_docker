<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::group(
    ['middleware' => ['auth'], 'prefix' => 'dashboard'],
    function () {
        // Dashboard
        Route::group(
            ['prefix' => '', 'as' => 'dashboard.'],
            function () {
                Route::get('/', [DashboardController::class, 'index'])->name('index');
            }

        );
        // Category
        Route::group(
            ['prefix' => 'categories', 'as' => 'categories.'],
            function () {
                Route::get('/', [CategoryController::class, 'index'])->name('index');

                Route::get('/create', [CategoryController::class, 'create'])->name('create');
                Route::post('/', [CategoryController::class, 'store'])->name('store');

                Route::get('{category:slug}/edit', [CategoryController::class, 'edit'])->name('edit');
                Route::put('{category:slug}/', [CategoryController::class, 'update'])->name('update');

                Route::delete('{category:slug}/delete', [CategoryController::class, 'destroy'])->name('delete');
            }
        );
    }

);
