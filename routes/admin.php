<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['isAdmin', 'auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
	Route::get('dashboard', [DashboardController::class, 'index'])->name('index');

	Route::group(['prefix' => 'categories', 'as' => 'categories'], function () {
		Route::get('index', [CategoryController::class, 'index'])->name('.index');

		Route::get('create', [CategoryController::class, 'create'])->name('.create');
		Route::post('/', [CategoryController::class, 'store'])->name('.store');

		Route::get('edit/{category:slug}', [CategoryController::class, 'edit'])->name('.edit');
		Route::put('update/{category:slug}', [CategoryController::class, 'update'])->name('.update');

		Route::get('{category:slug}', [CategoryController::class, 'show'])->name('.show');
		Route::delete('{category:slug}', [CategoryController::class, 'destroy'])->name('.destroy');
	});

	Route::group(['prefix' => 'tags', 'as' => 'tags'], function () {
		Route::get('index', [TagController::class, 'index'])->name('.index');

		Route::get('create', [TagController::class, 'create'])->name('.create');
		Route::post('/', [TagController::class, 'store'])->name('.store');

		Route::get('edit/{tag:slug}', [TagController::class, 'edit'])->name('.edit');
		Route::put('update/{tag:slug}', [TagController::class, 'update'])->name('.update');

		Route::get('{tag:slug}', [TagController::class, 'show'])->name('.show');
		Route::delete('{tag:slug}', [TagController::class, 'destroy'])->name('.destroy');
	});
});