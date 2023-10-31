<?php

namespace App\Http\Controllers;

use App\Models\AddFiveDayForecast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class fiveDayForecast extends Controller
{
    //
    public function index()
    {
        $fivedayforecastPending = AddFiveDayForecast::where('status', 'Pending')->orderByDesc('id')->get();
        $fivedayforecastApproved = AddFiveDayForecast::where('status', 'Approved')->orderByDesc('id')->get();

if (Auth::user()->usertype == 0) {
    $fivedayforecasts = AddFiveDayForecast::where('forecaster', Auth::user()->name)->orderByDesc('created_at')->get()->groupBy('randomId');

    $fivedayforecastPending = AddFiveDayForecast::where('status','Pending')->orderByDesc('created_at')->get()->groupBy('randomId');

    $fivedayforecastApproved = AddFiveDayForecast::where('status','Approved')->orderByDesc('created_at')->get()->groupBy('randomId');

}elseif (Auth::user()->usertype == 1  &&  Auth::user()->department == "CAFO"){
    $fivedayforecasts = AddFiveDayForecast::where('forecaster', Auth::user()->name)->where('department', 'CAFO' )->orderByDesc('created_at')->get()->groupBy('randomId');

    $fivedayforecastPending = AddFiveDayForecast::where('status','Pending')->where('department', 'CAFO' )->orderByDesc('created_at')->get()->groupBy('randomId');

    $fivedayforecastApproved = AddFiveDayForecast::where('status','Approved')->where('department', 'CAFO' )->orderByDesc('created_at')->get()->groupBy('randomId');


}elseif (Auth::user()->usertype == 1  &&  Auth::user()->department == "KIAMO"){
    $fivedayforecasts = AddFiveDayForecast::where('forecaster', Auth::user()->name)->where('department', 'KIAMO' )->orderByDesc('created_at')->get()->groupBy('randomId');

    $fivedayforecastPending = AddFiveDayForecast::where('status','Pending')->where('department', 'KIAMO' )->orderByDesc('created_at')->get()->groupBy('randomId');

    $fivedayforecastApproved = AddFiveDayForecast::where('status','Approved')->where('department', 'KIAMO' )->orderByDesc('created_at')->get()->groupBy('randomId');

}


// dd($fivedayforecasts);
// exit();

    return view('admin.fivedayForecast',
     ['fivedayforecastPending' => $fivedayforecastPending, 'fivedayforecastApproved' => $fivedayforecastApproved, 'fivedayforecasts' => $fivedayforecasts]);
    }

}
