<?php

namespace App\Http\Controllers;

use App\Models\AddFiveDayForecast;
use Illuminate\Http\Request;

class fiveDayForecast extends Controller
{
    //
    public function index()
    {
        $fivedayforecast = AddFiveDayForecast::orderByDesc('id')->get();
        // dd($districts);
    return view('admin.fivedayForecast',
     ['fivedayforecasts' => $fivedayforecast]);
    }

}
