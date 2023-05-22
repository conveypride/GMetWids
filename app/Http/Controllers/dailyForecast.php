<?php

namespace App\Http\Controllers;

use App\Models\AddDailyForecast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dailyForecast extends Controller
{
    //
    public function index()
    {
        $dailyforecast = AddDailyForecast::orderByDesc('created_at')->get();
    
    return view('admin.dailyForecast', ['dailyforecasts' => $dailyforecast]);
    }
    

}
