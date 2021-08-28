<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['isAdmin', 'auth'], 'prefix' => 'admin', 'as' => 'admin'], function () {
	Route::get('dashboard', [DashboardController::class, 'index'])->name('.index');
});