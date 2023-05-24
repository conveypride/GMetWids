<?php

namespace App\Http\Controllers;

use App\Models\AddFiveDayForecast as ModelsAddFiveDayForecast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddFiveDayForecast extends Controller
{
    //
    public function index()
    {
        // $dailyforecast = AddDailyForecast::orderByDesc('created_at')->get();
        // dd($districts);
    return view('admin.addFiveDayForecast'
    //  ['districts' => $districts]
    
    );
    }


public function create(Request $request)
    {
        $data = $request->all();
        // $datadate = $data['inputs'];
foreach ($data as $key => $value) {
    # code...
    $fivedays_table_values = new ModelsAddFiveDayForecast();
    $fivedays_table_values->date = $value['inputs'][0] ;
    $fivedays_table_values->min_temp = $value['inputs'][1];
    $fivedays_table_values->max_temp = $value['inputs'][2];
    $fivedays_table_values->weather = $value['select'];
    $fivedays_table_values->forecaster = Auth::user()->name;
    $fivedays_table_values->save();
}

    return response('success');
    }

    

}
