<?php

namespace App\Http\Controllers;

use App\Models\AddFiveDayForecast as ModelsAddFiveDayForecast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Cafodistricts;
use DateTime;

class AddFiveDayForecast extends Controller
{
    //

    public function index()
    {

        $next_five_days =  [];
        for ($i = 0; $i < 5; $i++) {
            $next_five_days[] = Carbon::now()->addDays($i)->format('Y-m-d');
        }
        

        $districts = Cafodistricts::orderBy('districtname')->get();
    return view('admin.addFiveDayForecast',
     ['districts' => $districts, 'next_five_days' => $next_five_days]
    
    );

    }


    public  function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[rand(0, strlen($characters) - 1)];
        }
        if (strlen($string) < 8) {
            return generateRandomString(8);
        }
        return $string;
    }
    


public function create(Request $request)
    {
        $data = $request->all();
        $randid =  $this->generateRandomString(8);
        // $datadate = $data['inputs'];
foreach ($data as $key => $value) {
    # code...
    $fivedays_table_values = new ModelsAddFiveDayForecast();
    $fivedays_table_values->district = 	$value['inputs'][0] ;
    $fivedays_table_values->date = $value['inputs'][1];
    $fivedays_table_values->min_temp =  $value['inputs'][2];
    $fivedays_table_values->max_temp = $value['inputs'][3];
    $fivedays_table_values->weather = $value['select'];
    $fivedays_table_values->forecaster = Auth::user()->name;
     $fivedays_table_values->usertype = Auth::user()->usertype;
     $fivedays_table_values->department = Auth::user()->department;
     $fivedays_table_values->randomId =  $randid;
    $fivedays_table_values->status = 'Pending' ;
    $fivedays_table_values->approvedBy = 'No One Yet';
    $fivedays_table_values->save();
}

    return response('success');
    }



   public function view($id)
    { 
        $fivedayforecasts = ModelsAddFiveDayForecast::where('randomId',$id)->get()->groupBy('district');
     $forecaststatus = ModelsAddFiveDayForecast::where('randomId',$id)->first();
        $idd = $id;

 $status1 = $forecaststatus->status;

// dd();
// exit();

return view('admin.viewFiveDayForecast', [ 'fivedayforecasts' => $fivedayforecasts, 'idd' =>  $idd, 'status1' => $status1]);





    }

  public function editfivedaysforecast(Request $request)
    { 

        ModelsAddFiveDayForecast::where('id',$request->id)->update([
         'date' => $request->date,
         'weather' =>  $request->weather,
         'min_temp' => $request->mintemp,
          'max_temp' => $request->maxtemp,

        ]);

 
        return redirect()->back();

    }



 public function approvefivedaysforecast($id)
    { 
        ModelsAddFiveDayForecast::where('randomId',$id)->update([
            'status' => 'Approved', 
   
           ]);

           return redirect()->route('fiveDayForecast');

    }


    
    
}
