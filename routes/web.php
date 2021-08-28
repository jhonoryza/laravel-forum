<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\ThreadController;

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

require('admin.php');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'threads', 'as' => 'threads.'], function () {
    Route::get('/', [ThreadController::class, 'index'])->name('index');
    Route::post('/', [ThreadController::class, 'store'])->name('store');
    Route::get('/create', [ThreadController::class, 'create'])->name('create');
    Route::get('/{category:slug}/{thread:slug}', [ThreadController::class, 'show'])->name('show');
});

Route::get('/category/discussion/topic', [PageController::class, 'single'])->name('single');

Route::get('discussion/create', [PageController::class, 'create'])->name('create');

Route::get('dashboard/users', [PageController::class, 'users'])->name('users');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
