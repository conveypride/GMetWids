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


Route::get('/', [App\Http\Controllers\Userhome::class,'index'])->name('welcome');
Route::get('/{city}', [App\Http\Controllers\Userhome::class,'seeDetailsOfCity'])->name('welcomeSelectCity');

Route::get('/verify', function () {
    return view('auth.verify');
});

Route::get('/test', function () {
    return view('layouts.test');
});


// admin
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/dailyforecast', [App\Http\Controllers\dailyForecast::class,'index'])->name('df');
    
    Route::get('/addFiveDayForecast', function () {
        return view('admin.addFiveDayForecast');
    })->name('addNewFD');
    
    Route::get('/fiveDayForecast', function () {
        return view('admin.fivedayForecast');
    })->name('fiveDayForecast');
    
    Route::get('/docs', function () {
        return view('admin.docs');
    })->name('docs');
    
    // cafodistrict
    Route::get('/cafoDistricts', [App\Http\Controllers\CafodistrictsController::class,'index'])->name('cafoDistricts');
    Route::post('/cafoDistrictspost', [App\Http\Controllers\CafodistrictsController::class,'create']);
    Route::post('/cafoDistrictsdelete', [App\Http\Controllers\CafodistrictsController::class,'delete']);
    
    // addDailyForecast
    Route::get('/addNewDailyForecast', [App\Http\Controllers\AddDailyForecast::class,'index'])->name('addNewDf');
    Route::post('/addNewDailyForecastpost', [App\Http\Controllers\AddDailyForecast::class,'create']);
    Route::post('/addNewDailyForecastedit', [App\Http\Controllers\AddDailyForecast::class,'edit']);
    Route::post('/addNewDailyForecastdelete', [App\Http\Controllers\AddDailyForecast::class,'delete']);
    



    Route::get('/history', function () {
        return view('admin.history');
    })->name('history');
    
    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('settings');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


Auth::routes();


