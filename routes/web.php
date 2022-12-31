<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SettingController;

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

Route::get('/', [LandingController::class, 'index']);
Route::get('/plantlist', [LandingController::class, 'plantlist']);
Route::get('/plantlist/{plant}', [LandingController::class, 'showPlantlist']);
Route::get('/about', [LandingController::class, 'about']);


// admin
Route::group(['middleware' => ['role:admin|user']], function () {
    Route::get('/dashboard', [HomeController::class, 'index']);
    Route::resource('plant', PlantController::class);
    Route::resource('setting', SettingController::class);
});
