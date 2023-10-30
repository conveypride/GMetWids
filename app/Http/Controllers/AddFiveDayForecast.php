<?php

namespace App\Http\Controllers;

use App\Models\AddFiveDayForecast as ModelsAddFiveDayForecast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cafodistricts;
use DateTime;

class AddFiveDayForecast extends Controller
{
    //

    public function index()
    {

        $next_five_days = array();
        $date = new DateTime();
        for ($i = 0; $i < 5; $i++) {
            do {
                $date->modify('+1 day');
            } while ($date->format('N') >= 6);
            $next_five_days[] = $date->format('Y-m-d');
        }
        

        $districts = Cafodistricts::orderBy('districtname')->get();
    return view('admin.addFiveDayForecast',
     ['districts' => $districts, 'next_five_days' => $next_five_days]
    
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
