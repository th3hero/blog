<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\TagsController;
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

Auth::routes();
Route::get('/', function () {return view('pages.home');})->name('root.page');
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('tags', TagsController::class);
Route::resource('blog', BlogController::class);
