<?php

namespace App\Http\Controllers;

use App\Models\AddDailyForecast as ModelsAddDailyForecast;
use App\Models\Afternoon_general_variables;
use App\Models\Afternoon_table_values;
use App\Models\AfternoonMarkers;
use App\Models\AfternoonPolygon;
use App\Models\Evening_general_variables;
use App\Models\Evening_table_values;
use App\Models\EveningMarkers;
use App\Models\EveningPolygon;
use App\Models\Morning_general_variables;
use App\Models\Morning_table_values;
use App\Models\MorningMarkers;
use App\Models\MorningPolygon;
use App\Models\Cafodistricts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class AddDailyForecast extends Controller
{

    public function getTimeOfDay()
    {
        // Convert the created_at timestamp to a Carbon instance
        $created_at = Carbon::parse(now());
    
        // Get the hour of the day
        $hour = $created_at->hour;
    
        // Determine the post time of day
        // if published betwen 12am to 7am start from the morning
        if ($hour >= 00 && $hour < 7) {
            return 'Morning';
        }
        // else if published betwen 7am to 12pm start from the afternoon
     elseif ($hour >= 7 && $hour < 13) {
            return 'Afternoon';

        } elseif ($hour >=13 && $hour < 24) {
            return 'Evening';
           
        }
    }


    //
    public function index()
    {
        $idd = ModelsAddDailyForecast::where('publishType', 'Publish-Forecast')->latest('created_at')->value('id'); ;

        $dailyforecast = ModelsAddDailyForecast::where('id', $idd)->first();
       if(isset($dailyforecast)){

      
        $genMorning= $dailyforecast->morning_general_variables()->first();
         $genAfternoon= $dailyforecast->afternoon_general_variables()->first();
        $genEvening= $dailyforecast->evening_general_variables()->first();
       
         $morning = $dailyforecast->morning_table_values()->get();
          $afternoon = $dailyforecast->afternoon_table_values()->get();
        $evening =  $dailyforecast->evening_table_values()->get(); 

        $polygonDatemorning = $dailyforecast->morning_polygons()->first();
        $polygonDateafternoon = $dailyforecast->afternoon_polygons()->first();
      $polygonDateevening =  $dailyforecast->evening_polygons()->first(); 

   
        $districts = DB::table('cafodistricts')->orderBy('districtname')->get();

        $districtss = Cafodistricts::pluck('districtname')->toArray() ; 


        $morningcitiesavailable = $dailyforecast->morning_table_values()->whereIn('districts',$districtss )->pluck('districts')->toArray();
        $afternooncitiesavailable = $dailyforecast->afternoon_table_values()->whereIn('districts',$districtss )->pluck('districts')->toArray();
        $eveningcitiesavailable = $dailyforecast->evening_table_values()->whereIn('districts',$districtss )->pluck('districts')->toArray();
      
        $missingmorningcities =  array_diff($districtss,$morningcitiesavailable);
        $missingafternooncities =  array_diff($districtss,$afternooncitiesavailable);
        $missingeveningcities =  array_diff($districtss,$eveningcitiesavailable);

    //     $afternoon1 = $dailyforecast->afternoon_table_values()->get();
    //   $evening1 =  $dailyforecast->evening_table_values()->get(); 
}else{
    $districts = [];
    $genMorning = [];
    $genEvening = [];
    $genAfternoon = [];
    $morning = [];
    $afternoon = [];
$evening= [];
$polygonDatemorning= [];
$polygonDateafternoon= [];
$polygonDateevening = [];
$missingmorningcities = [];
$missingeveningcities= [];

}



        // dd($missingeveningcities);

        // dd( $evening);

        // exit();
    return view('admin.addNewDailyForecast', [
        'districts' => $districts,
        'genMorning' => $genMorning,
        'genAfternoon' => $genAfternoon,
        'genEvening' => $genEvening,
        'morningtablevalue' => $morning,
        'afternoontablevalue' => $afternoon,
        'eveningtablevalue' => $evening,
        'polygonDatemorning' => $polygonDatemorning,
        'polygonDateafternoon' => $polygonDateafternoon,
        'polygonDateevening' => $polygonDateevening,
        'forecasttype' => $this->getTimeOfDay(),
        'missingmorningcities' => $missingmorningcities,
        'missingafternooncities' => $missingafternooncities,
        'missingeveningcities' => $missingeveningcities



]);
    }

 

    public function create(Request $request)
    {
        // $randomId  = $this->generateRandomId();
        $data = $request->all();
        $tableMorningDate = $data[0]['dateItdPressureValues'][0];
        $tableItdPositionMorning =  $data[0]['dateItdPressureValues'][1];
        // $tablePressureMorning =  $data[0]['dateItdPressureValues'][2];
        $tableAfternoonDate = $data[0]['dateItdPressureValues'][2];
        $tableItdPositionAfternoon =  $data[0]['dateItdPressureValues'][3];
        // $tablePressureAfternoon =  $data[0]['dateItdPressureValues'][4];
        $tableEveningDate = $data[0]['dateItdPressureValues'][4];
        $tableItdPositionEvening =  $data[0]['dateItdPressureValues'][5];
        // $tablePressureEvening=  $data[0]['dateItdPressureValues'][8];
        $tableMorningValues = $data[0]['tableValues']['morningValues'];
        $tableAfternoonValues = $data[0]['tableValues']['afternoonValues'];
        $tableEveningValues = $data[0]['tableValues']['eveningValues'];
        $mapMorningDate = $data[0]['mapdates']['morningdate'];
        $mapAfternoonDate = $data[0]['mapdates']['afternoondate'];
        $mapEveningDate = $data[0]['mapdates']['eveningdate'];
        $markersMorning = $data[0]['markers']['markersmor'];
        $markersAfternoon = $data[0]['markers']['markersaf'];
        $markersEvening = $data[0]['markers']['markersev'];
        $ploygonsMorning = $data[0]['polygons']['ploygonsmorning'];
        $ploygonsAfternoon = $data[0]['polygons']['ploygonsafternoon'];
        $ploygonsEvening = $data[0]['polygons']['ploygonsevening'];
        $publishType = $data[0]['publishType'];
       
        $summary = $data[0]['summary'];
        $textareaweatherwarning = $data[0]['textareaweatherwarning'];
        $warningtype  = $data[0]['warningtype'];



        if (is_null($data[0]['textareaweatherwarning'])) {
            // Variable is null 
            $textareaweatherwarning= 'null';
        } else {
            // Variable is not null
            $textareaweatherwarning= $data[0]['textareaweatherwarning'];
        }

        if (is_null($data[0]['warningtype'])) {
            // Variable is null 
            $warningtype = 'null';
        } else {
            // Variable is not null
            $warningtype = $data[0]['warningtype'];
        }



        if (is_null($data[0]['scheduledate'])) {
            // Variable is null 
            $scheduledate= 'no date';
        } else {
            // Variable is not null
            $scheduledate = $data[0]['scheduledate'];
        }

        
 // Create a new instance of add_daily_forecasts
 $add_daily_forecasts = new ModelsAddDailyForecast();
 $add_daily_forecasts->publishType = 'Pending-Forecast';
 $add_daily_forecasts->creator =  Auth::user()->name;
 $add_daily_forecasts->scheduledate= $scheduledate;
 $add_daily_forecasts->summary =  $summary;
$add_daily_forecasts->textareaweatherwarning = $textareaweatherwarning;
$add_daily_forecasts->warningtype = $warningtype;
$add_daily_forecasts->department = Auth::user()->department;
$add_daily_forecasts->usertype = Auth::user()->usertype;
$add_daily_forecasts->save();

  // Create a new instance of morning_general_variables
  $morning_general_variables = new Morning_general_variables();
//   $morning_general_variables->id = $randomId;
  $morning_general_variables->date = $tableMorningDate;
//   $morning_general_variables->pressure= $tablePressureMorning;
  $morning_general_variables->itd = Str::upper($tableItdPositionMorning);
  $add_daily_forecasts->morning_general_variables()->save($morning_general_variables);

 // Create a new instance of afternoon_general_variables
 $afternoon_general_variables = new Afternoon_general_variables();
//  $afternoon_general_variables->id = $randomId;
 $afternoon_general_variables->date = $tableAfternoonDate;
//  $afternoon_general_variables->pressure= $tablePressureAfternoon;
 $afternoon_general_variables->itd = Str::upper($tableItdPositionAfternoon);
 $add_daily_forecasts->afternoon_general_variables()->save($afternoon_general_variables);


 // Create a new instance of evening_general_variables
 $evening_general_variables = new Evening_general_variables();
//  $evening_general_variables->id = $randomId;
 $evening_general_variables->date = $tableEveningDate;
//  $evening_general_variables->pressure= $tablePressureEvening;
 $evening_general_variables->itd = Str::upper($tableItdPositionEvening);
 $add_daily_forecasts->evening_general_variables()->save($evening_general_variables);
 // Create a new instance of morning_table_values
foreach ($tableMorningValues as $item) {
    $district = $item['districts'];
    $values = $item['values'];
    $morning_table_values = new Morning_table_values();
    $morning_table_values->districts = $district;
    $morning_table_values->min_temp = $values[0];
    $morning_table_values->max_temp = $values[1];
    $morning_table_values->wind = Str::upper($values[2]);
    $morning_table_values->weather = $values[3];
    $morning_table_values->rain_chance = $values[4];
    $morning_table_values->humidity = $values[5];
    $morning_table_values->morningDate = $tableMorningDate;
    $morning_table_values->forecaster = Auth::user()->name;

   $add_daily_forecasts->morning_table_values()->save($morning_table_values);
}

// Create a new instance of afternoon_table_values
foreach ($tableAfternoonValues as $item) {
    $district = $item['districts'];
    $values = $item['values'];
    $afternoon_table_values = new Afternoon_table_values();
    $afternoon_table_values->districts = $district;
    $afternoon_table_values->min_temp = $values[0];
    $afternoon_table_values->max_temp = $values[1];
    $afternoon_table_values->wind = Str::upper($values[2]);
    $afternoon_table_values->weather = $values[3];
    $afternoon_table_values->rain_chance = $values[4];
    $afternoon_table_values->humidity = $values[5];
    $afternoon_table_values->afternoonDate = $tableAfternoonDate;
    $afternoon_table_values->forecaster = Auth::user()->name;

    $add_daily_forecasts->afternoon_table_values()->save($afternoon_table_values);

    // $afternoon_table_values->save();
}

// Create a new instance of evening_table_values
foreach ($tableEveningValues as $item) {
    $district = $item['districts'];
    $values = $item['values'];
    $evening_table_values = new Evening_table_values();
    $evening_table_values->districts = $district;
    $evening_table_values->min_temp = $values[0];
    $evening_table_values->max_temp = $values[1];
    $evening_table_values->wind = Str::upper($values[2]);
    $evening_table_values->weather = $values[3];
    $evening_table_values->rain_chance = $values[4];
    $evening_table_values->humidity = $values[5];
    $evening_table_values->eveningDate =  $tableEveningDate;
    $evening_table_values->forecaster = Auth::user()->name;
    $add_daily_forecasts->evening_table_values()->save($evening_table_values);
}


 // Create a new instance of morning_markers
 foreach ($markersMorning as $item) {
    $morning_markers = new MorningMarkers();
    $morning_markers->markerId = $item['id'];
    $morning_markers->morningDate = $mapMorningDate;
    $morning_markers->icontype = $item['icontype'];
    $morning_markers->iconsize = $item['iconsize'];
    $morning_markers->lng = $item['lnglat']['lng'];
    $morning_markers->lat = $item['lnglat']['lat'];
    $add_daily_forecasts->morning_markers()->save($morning_markers);
    

}


 // Create a new instance of afternoon_markers
 foreach ($markersAfternoon as $item) {
    $afternoon_markers = new AfternoonMarkers();
    $afternoon_markers->markerId = $item['id'];
    $afternoon_markers->afternoonDate = $mapAfternoonDate;
    $afternoon_markers->icontype = $item['icontype'];
    $afternoon_markers->iconsize = $item['iconsize'];
    $afternoon_markers->lng = $item['lnglat']['lng'];
    $afternoon_markers->lat = $item['lnglat']['lat'];
    $add_daily_forecasts->afternoon_markers()->save($afternoon_markers);
}



// Create a new instance of evening_markers
foreach ($markersEvening as $item) {
    $evening_markers = new EveningMarkers();
    $evening_markers->markerId = $item['id'];
    $evening_markers->eveningDate = $mapEveningDate;
    $evening_markers->icontype = $item['icontype'];
    $evening_markers->iconsize = $item['iconsize'];
    $evening_markers->lng = $item['lnglat']['lng'];
    $evening_markers->lat = $item['lnglat']['lat'];
    $add_daily_forecasts->evening_markers()->save($evening_markers);
    // $evening_markers->save();
}

 // Create a new instance of morning_polygons
 if(!empty($ploygonsMorning)){
     foreach ($ploygonsMorning as $item) {
    $morning_polygons = new MorningPolygon();
    $morning_polygons->polygonId = $item['id'];
    $morning_polygons->morningDate =  $mapMorningDate;
    $morning_polygons->color = $item['color'];
    $morning_polygons->cordinate = json_encode($item['cordinates']); 
    $add_daily_forecasts->morning_polygons()->save($morning_polygons);
}
 }



 // Create a new instance of afternoon_polygons
 if(!empty($ploygonsAfternoon)){
 foreach ($ploygonsAfternoon as $item) {
    $afternoon_polygons = new AfternoonPolygon();
    $afternoon_polygons->polygonId = $item['id'];
    $afternoon_polygons->afternoonDate = $mapAfternoonDate;
    $afternoon_polygons->color = $item['color'];
    $afternoon_polygons->cordinate = json_encode($item['cordinates']); 
    $add_daily_forecasts->afternoon_polygons()->save($afternoon_polygons);
}
 }
 // Create a new instance of evening_polygons
 if(!empty($ploygonsEvening)){
 foreach ($ploygonsEvening as $item) {
    $evening_polygons = new EveningPolygon();
    $evening_polygons->polygonId = $item['id'];
    $evening_polygons->eveningDate = $mapEveningDate;
    $evening_polygons->color = $item['color'];
    $evening_polygons->cordinate = json_encode($item['cordinates']); 
    $add_daily_forecasts->evening_polygons()->save($evening_polygons);
}
 }


         // Return a response to indicate success
  return response('Form submitted successfully', 200);
    //     $districts = DB::table('cafodistricts')->orderBy('districtname')->get();
    //     // dd($districts);
    // return view('admin.addNewDailyForecast', ['districts' => $districts]);
    }


   


}
