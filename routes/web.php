<?php

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
    return view('welcome');
});

Route::get('/test', function () {
    return view('layouts.test');
});

Route::get('/dailyforecast', function () {
    return view('admin.dailyForecast');
})->name('df');

Route::get('/addNewDailyForecast', function () {
    return view('admin.addNewDailyForecast');
})->name('addNewDf');

Route::get('/addFiveDayForecast', function () {
    return view('admin.addFiveDayForecast');
})->name('addNewFD');

Route::get('/fiveDayForecast', function () {
    return view('admin.fivedayForecast');
})->name('fiveDayForecast');

Route::get('/docs', function () {
    return view('admin.docs');
})->name('docs');

Route::get('/cafoDistricts', function () {
    return view('admin.cafoDistricts');
})->name('cafoDistricts');

Route::get('/history', function () {
    return view('admin.history');
})->name('history');

Route::get('/settings', function () {
    return view('admin.settings');
})->name('settings');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
