<?php

use App\Http\Controllers\PDFController;
use App\Http\Controllers\AddnewuserController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\Userhome::class,'index'])->name('welcome');
Route::get('/filter/{city}', [App\Http\Controllers\Userhome::class,'seeDetailsOfCity'])->name('welcomeSelectCity');
Route::post('/feedbackpost', [App\Http\Controllers\Feedback::class,'create'])->name('feedbackpost');
Route::get('/viewAllmap', [App\Http\Controllers\Userhome::class,'viewallMap'])->name('viewAllmap');
Route::get('/inlandviewAllmap', [App\Http\Controllers\Userhome::class,'inlandviewallMap'])->name('inlandviewAllmap');

Route::get('/test', function () {
    return view('admin.cafoMorningTemplate_Forecast');
});

Route::get('/verifi', function () {
    return view('auth.verify');
})->name('verifi');

// admin
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
Route::get('addnewuser', [AddnewuserController::class, 'addnewuser'])->name('addnewuser');
Route::post('updateuser', [AddnewuserController::class, 'updateuser'])->name('updateuser');
Route::post('createUser', [AddnewuserController::class, 'createUser'])->name('createUser');

    Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->name('generatePDF');
    
    Route::get('/dailyforecast', [App\Http\Controllers\dailyForecast::class,'index'])->name('df');

Route::post('/deleteforecast', [App\Http\Controllers\dailyForecast::class,'deleteforecast'])->name('deleteforecast');

Route::post('/approveforecast', [App\Http\Controllers\dailyForecast::class,'approveforecast'])->name('approveforecast');
    
    Route::get('/viewdailyforecast/{id}', [App\Http\Controllers\dailyForecast::class,'viewdailyforecast'])->name('viewdailyforecast');
 Route::get('/viewdailyforecastMap/{id}', [App\Http\Controllers\dailyForecast::class,'viewdailyforecastMap'])->name('viewdailyforecastMap');

Route::get('/viewinlandforecast/{id}', [App\Http\Controllers\InlandForecastController::class,'viewinlandforecast'])->name('viewinlandforecast');
 Route::get('/viewinlandforecastMap/{id}', [App\Http\Controllers\InlandForecastController::class,'viewinlandforecastMap'])->name('viewinlandforecastMap');


 Route::post('/editgentablevalue', [App\Http\Controllers\dailyForecast::class,'editgentablevalue'])->name('editgentablevalue');
Route::post('/editMap', [App\Http\Controllers\dailyForecast::class,'editMap'])->name('editMap');

Route::post('/editSummary', [App\Http\Controllers\dailyForecast::class,'editSummary'])->name('editSummary');

 
 Route::post('/edittablevalue', [App\Http\Controllers\dailyForecast::class,'edittablevalue'])->name('edittablevalue');
     Route::get('/editdailyforecastTable/{id}', [App\Http\Controllers\dailyForecast::class,'editdailyforecastTable'])->name('editdailyforecastTable');
    Route::get('/addFiveDayForecast', [App\Http\Controllers\AddFiveDayForecast::class,'index'])->name('addNewFD');
    Route::post('/addFiveDayForecastpost', [App\Http\Controllers\AddFiveDayForecast::class,'create']);
  Route::get('/viewfivedayforecast/{id}', [App\Http\Controllers\AddFiveDayForecast::class,'view'])->name('viewfivedayforecast');
 Route::post('/editfivedaysforecast', [App\Http\Controllers\AddFiveDayForecast::class,'editfivedaysforecast'])->name('editfivedaysforecast');
 Route::post('/approvefivedaysforecast/{id}', [App\Http\Controllers\AddFiveDayForecast::class,'approvefivedaysforecast'])->name('approvefivedaysforecast');


    Route::get('/fiveDayForecast',  [App\Http\Controllers\fiveDayForecast::class,'index'])->name('fiveDayForecast');
    
    Route::get('/docs', function () {
        return view('admin.docs');
    })->name('docs');
    
    // cafodistrict
    Route::get('/cafoDistricts', [App\Http\Controllers\CafodistrictsController::class,'index'])->name('cafoDistricts');
    Route::post('/cafoDistrictspost', [App\Http\Controllers\CafodistrictsController::class,'create']);
    Route::post('/cafoDistrictsdelete', [App\Http\Controllers\CafodistrictsController::class,'delete']);

  // marineDistricts
    Route::get('/marineDistricts', [App\Http\Controllers\MarineDistricts::class,'index'])->name('marineDistricts');
    Route::post('/marineDistrictspost', [App\Http\Controllers\MarineDistricts::class,'create']);
    Route::post('/marineDistrictsdelete', [App\Http\Controllers\MarineDistricts::class,'delete']);
// marine forecast
Route::get('/marineforecast', [App\Http\Controllers\MarineForecastController::class,'index'])->name('mmf');
Route::get('/addmarineforecast', [App\Http\Controllers\MarineForecastController::class,'addNewMf'])->name('addNewMf');
Route::post('/addmarineforecastpost', [App\Http\Controllers\MarineForecastController::class,'create']);
    Route::get('/viewmarineforecast/{id}', [App\Http\Controllers\MarineForecastController::class,'viewmarineforecast'])->name('viewmarineforecast');
 Route::get('/viewmarineforecastMap/{id}', [App\Http\Controllers\MarineForecastController::class,'viewmarineforecastMap'])->name('viewmarineforecastMap');
 Route::get('/editmarineforecastTable/{id}', [App\Http\Controllers\MarineForecastController::class,'editmarineforecastTable'])->name('editmarineforecastTable');
  Route::post('/editmarineTable', [App\Http\Controllers\MarineForecastController::class,'editmarineTable'])->name('editmarineTable');
 Route::post('/editmarinemap', [App\Http\Controllers\MarineForecastController::class,'editmarinemap'])->name('editmarinemap');
// inland forecast
Route::get('/inlandforecast', [App\Http\Controllers\InlandForecastController::class,'index'])->name('mIf');
Route::get('/addinlandforecast', [App\Http\Controllers\InlandForecastController::class,'addNewIf'])->name('addNewIf');
Route::post('/addinlandforecastpost', [App\Http\Controllers\InlandForecastController::class,'create']);

    
    
    // addDailyForecast
    Route::get('/addNewDailyForecast', [App\Http\Controllers\AddDailyForecast::class,'index'])->name('addNewDf');
    Route::post('/addNewDailyForecastpost', [App\Http\Controllers\AddDailyForecast::class,'create']);
    Route::post('/addNewDailyForecastedit', [App\Http\Controllers\AddDailyForecast::class,'edit']);
    Route::post('/addNewDailyForecastdelete', [App\Http\Controllers\AddDailyForecast::class,'delete']);

    
    // rainTempUpload
    Route::get('/rainTempUpload', [App\Http\Controllers\AddrainTempUpload::class,'index'])->name('rainTempUpload');
     Route::get('/addrainTempUpload', [App\Http\Controllers\AddrainTempUpload::class,'addImgView'])->name('addrainTempUpload');
 Route::post('/addrainTempUploadpost', [App\Http\Controllers\AddrainTempUpload::class,'create'])->name('addrainTempUploadpost');

    Route::post('/addrainTempUploadedit', [App\Http\Controllers\AddrainTempUpload::class,'edit']);
    Route::post('/addrainTempUploaddelete', [App\Http\Controllers\AddrainTempUpload::class,'delete']);

    // seasonalforecast
    Route::get('/seasonalforecast', [App\Http\Controllers\SeasonalforecastController::class,'index'])->name('seasonalforecast');
Route::get('/seasonalforecastUpload', [App\Http\Controllers\SeasonalforecastController::class,'seasonaladd'])->name('seasonalforecastUpload');
    Route::post('/seasonalforecastUploadpost', [App\Http\Controllers\SeasonalforecastController::class,'create'])->name('seasonalforecastUploadpost');


    Route::get('/history', function () {
        return view('admin.history');
    })->name('history');
    
    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('settings');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  
});



// tesing something..