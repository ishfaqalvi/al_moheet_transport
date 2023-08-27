<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\DynamicPageController;

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

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
| All route related to user
*/
Auth::routes();

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
| All route related to admin include in this file
*/
Route::group(['middleware' => ['auth']], function() {
    Route::prefix('/admin')->namespace('\App\Http\Controllers\Admin')->group(__DIR__.'/admin.php');
});

/*
|--------------------------------------------------------------------------
| Dynamic Pages Routes
|--------------------------------------------------------------------------
*/
Route::controller(DynamicPageController::class)->group(function () {
	Route::get('/', 					'viewHomePage')->name('home');
	// Route::get('/{slug1}/{slug2?}', 	'viewPage'	  )->name('viewPage');
});