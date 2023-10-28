<?php

namespace App\Http\Controllers;

use App\Models\AddDailyForecast;
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
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class dailyForecast extends Controller
{
    //
    public $time = [];
    public $polygons = [];
    public $polygonsM = [];
    public $polygonsA = [];
    public $polygonsE = [];
    public $markers = [];
    public $markersM = [];
    public $markersA = [];
    public $markersE = [];
 
    public function getTimeOfDay($created_at)
    {
        // Convert the created_at timestamp to a Carbon instance
        $created_at = Carbon::parse($created_at);
    
        // Get the hour of the day
        $hour = $created_at->hour;
    
        // Determine the post time of day
        // if published betwen 12am to 7am start from the morning
        if ($hour >= 00 && $hour < 7) {
            return 'Morning';
        }
        // else if published betwen 7am to 12pm start from the afternoon
     elseif ($hour >= 7 && $hour < 14) {
            return 'Afternoon';

        } elseif ($hour >14 && $hour < 24) {
            return 'Evening';
        }
    }


    public function index()
    {

        if(Auth::user()->usertype == 0){
            $dailyforecast = AddDailyForecast::orderByDesc('created_at')->get();
        }elseif(Auth::user()->usertype == 1 && Auth::user()->department == 'CAFO' ) {
            $dailyforecast = AddDailyForecast::where('department', 'CAFO')->orderByDesc('created_at')->get();

        }elseif(Auth::user()->usertype == 1 && Auth::user()->department == 'KIAMO' ) {
            $dailyforecast = AddDailyForecast::where('department', 'KIAMO')->orderByDesc('created_at')->get();
            
        } elseif(Auth::user()->usertype == 2 && Auth::user()->department == 'CAFO' ) {
            $dailyforecast = AddDailyForecast::where('creator', Auth::user()->name)->where('department', 'CAFO')->orderByDesc('created_at')->get();
        } 
       elseif(Auth::user()->usertype == 2 && Auth::user()->department == 'KIAMO' ) {
            $dailyforecast = AddDailyForecast::where('creator', Auth::user()->name)->where('department', 'KIAMO')->orderByDesc('created_at')->get();
        } 
     
    
    return view('admin.dailyForecast', ['dailyforecasts' => $dailyforecast]);
    }


public function deleteforecast(Request $request)
    {
$id = $request->idd;
AddDailyForecast::where('id', $id)->update([
'publishType' => 'Delete-Forecast'
]);

return redirect()->route('df');
    }


public function approveforecast(Request $request)
    {
$id = $request->iddd;
AddDailyForecast::where('id', $id)->update([
'publishType' => 'Publish-Forecast',
'approvedby' => Auth::user()->name

]);

return redirect()->route('df');
    }


    
    
public function viewdailyforecast($id)
    {
        
        $dailyforecast = AddDailyForecast::where('id', $id)->first();
        $morning = $dailyforecast->morning_table_values()->get();
        $afternoon = $dailyforecast->afternoon_table_values()->get();
        $evening =  $dailyforecast->evening_table_values()->get(); 
        $time = $this->getTimeOfDay($dailyforecast->created_at);

    return view('admin.cafoTableForecastTemplate',compact('time','morning','afternoon','evening', 'dailyforecast'));
    }


 
public function editdailyforecastTable($id)
    {

        $dailyforecast = AddDailyForecast::where('id', $id)->first();
       
        $genMorning= $dailyforecast->morning_general_variables()->first();
         $genAfternoon= $dailyforecast->afternoon_general_variables()->first();
        $genEvening= $dailyforecast->evening_general_variables()->first();
       
         $morning = $dailyforecast->morning_table_values()->get();
          $afternoon = $dailyforecast->afternoon_table_values()->get();
        $evening =  $dailyforecast->evening_table_values()->get(); 

        $polygonDatemorning = $dailyforecast->morning_polygons()->first();
        $polygonDateafternoon = $dailyforecast->afternoon_polygons()->first();
      $polygonDateevening =  $dailyforecast->evening_polygons()->first(); 

    // dd($genMorning);
    // exit();
        return view('admin.editDailyForecast', [
            'genMorning' => $genMorning,
            'genAfternoon' => $genAfternoon,
            'genEvening' => $genEvening,
            'morning' => $morning,
            'afternoon' => $afternoon,
            'evening' => $evening,
            'forecastid' => $id,
            'polygonDatemorning' => $polygonDatemorning,
            'polygonDateafternoon' => $polygonDateafternoon,
            'polygonDateevening' => $polygonDateevening
           
    ]);
    }

public function editgentablevalue(Request $request)
    {
// Get the JSON data from the request
$datav = $request->json()->all();

// Access the "date" and "itd" values
$date = $datav['date'];
$itd = $datav['itd'];
$forecastid = $datav['forecastid'];
$tableid = $datav['tableid'];
$forecastTime = $datav['forecastTime'];
 
if($forecastTime == "Morning"){
 Morning_general_variables::where('add_daily_forecast_id', $forecastid)->where('id',$tableid)->update(
    [
        'itd' => $itd,
        'date' => $date
    ]
 );

 Morning_table_values::where('add_daily_forecast_id', $forecastid)->update(
    [
        'morningDate' => $date
    ]
 );


}else if($forecastTime == "Afternoon"){
   Afternoon_general_variables::where('add_daily_forecast_id', $forecastid)->where('id',$tableid)->update(
        [
            'itd' => $itd,
            'date' => $date
        ]
     );
      Afternoon_table_values::where('add_daily_forecast_id', $forecastid)->update(
        [
            'afternoonDate' => $date,
        ]
     );


}else if($forecastTime == "Evening"){
    Evening_general_variables::where('add_daily_forecast_id', $forecastid)->where('id',$tableid)->update(
        [
            'itd' => $itd,
            'date' => $date
        ]
     );
    
     Evening_table_values::where('add_daily_forecast_id', $forecastid)->update(
        [
            'eveningDate' => $date,
        ]
     );

}

$data = [
$date,
$itd,
$forecastid,
$tableid, 
$forecastTime ];


    return response()->json(['message' => 'Data received successfully', 'data' => $data]);
    }

    


    public function edittablevalue(Request $request)
    {
// Get the JSON data from the request
$datav = $request->json()->all();

// Access the "date" and "itd" values
$weather = $datav['weather'];
$minTemperature = $datav['minTemperature'];
$maxTemperature = $datav['maxTemperature'];
$wind = $datav['wind'];
$rainChance = $datav['rainChance'];
$humidity = $datav['humidity'];
$forecastid = $datav['forecastId'];
$tableid = $datav['tableId'];
$forecastTime = $datav['forecastTime'];
 
if($forecastTime == "Morning"){
 Morning_table_values::where('add_daily_forecast_id', $forecastid)->where('id',$tableid)->update(
    [
        'min_temp' => $minTemperature,
        'max_temp' => $maxTemperature,
        'wind' => $wind,
        'rain_chance' => $rainChance,
        'weather' => $weather,
        'humidity' => $humidity
    ]
 );

}else if($forecastTime == "Afternoon"){
   Afternoon_table_values::where('add_daily_forecast_id', $forecastid)->where('id',$tableid)->update(
    [
        'min_temp' => $minTemperature,
        'max_temp' => $maxTemperature,
        'wind' => $wind,
        'rain_chance' => $rainChance,
        'weather' => $weather,
        'humidity' => $humidity
    ]
     );
    

}else if($forecastTime == "Evening"){
    Evening_table_values::where('add_daily_forecast_id', $forecastid)->where('id',$tableid)->update(
        [
            'min_temp' => $minTemperature,
            'max_temp' => $maxTemperature,
            'wind' => $wind,
            'rain_chance' => $rainChance,
            'weather' => $weather,
            'humidity' => $humidity
        ]
     );
    

}

$data = [
    $weather,
    $minTemperature,
    $maxTemperature,
    $wind,
    $rainChance,
    $humidity,
    $forecastid,
    $tableid,
    $forecastTime
 ];

    return response()->json(['message' => 'Data received successfully', 'data' => $data]);
    }
    

public function viewdailyforecastMap($id)
    {
        
        //  ====================morning map for viewall map==================
    // now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('id', $id)->where('publishType', 'Publish-Forecast')->first();
    // now get the map details 
    $polugonm = [];
    $polygonnsm=  $addDailyForecast->morning_polygons()->pluck('cordinate')->all();
  $colorsm= $addDailyForecast->morning_polygons()->pluck('color')->all();
  $polygonIdm = $addDailyForecast->morning_polygons()->pluck('polygonId')->all();
  foreach ($polygonnsm as $index => $polygon) {
      $polugonnm = [
        'polygonId' => $polygonIdm[$index],
        'polygon' =>  $polygon,
        'color' => $colorsm[$index],
  ]; 
  $polugonm[] = $polugonnm;
  }
  
  $this->polygonsM =$polugonm;
  // get the markers
  $markersm = [];
  $markerslatm = $addDailyForecast->morning_markers()->pluck('lat')->all();
  $markerslngm = $addDailyForecast->morning_markers()->pluck('lng')->all();
  $icontypem = $addDailyForecast->morning_markers()->pluck('icontype')->all();
  $markerIdsm = $addDailyForecast->morning_markers()->pluck('markerId')->all();
  foreach ($markerIdsm as $index => $markerId) {
      $marker = [
          'markerId' => $markerId,
          'markerslnglat' => [
              'lng' => $markerslngm[$index],
              'lat' => $markerslatm[$index],
          ],
          'icontype' => $icontypem[$index],
      ];
  
      $markersm[] = $marker;
  }
  
  $this->markersM = $markersm;


// 
// ====================AFTERNOON map for viewall map==================

$polugona = [];
  $polygonnsa=  $addDailyForecast->afternoon_polygons()->pluck('cordinate')->all();
$colorsa= $addDailyForecast->afternoon_polygons()->pluck('color')->all();
$polygonIda = $addDailyForecast->afternoon_polygons()->pluck('polygonId')->all();
foreach ($polygonnsa as $index => $polygon) {
    $polugonna = [
      'polygonId' => $polygonIda[$index],
      'polygon' =>  $polygon,
      'color' => $colorsa[$index],
]; 
$polugona[] = $polugonna;
}

$this->polygonsA =$polugona;

// get the markers
$markersa = [];
$markerslata = $addDailyForecast->afternoon_markers()->pluck('lat')->all();
$markerslnga = $addDailyForecast->afternoon_markers()->pluck('lng')->all();
$icontypea = $addDailyForecast->afternoon_markers()->pluck('icontype')->all();
$markerIdsa = $addDailyForecast->afternoon_markers()->pluck('markerId')->all();
foreach ($markerIdsa as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslnga[$index],
            'lat' => $markerslata[$index],
        ],
        'icontype' => $icontypea[$index],
    ];

    $markersa[] = $marker;
}

$this->markersA = $markersa;


// ====================EVENING  map for viewall map==================


$polugone = [];
  $polygonnse=  $addDailyForecast->evening_polygons()->pluck('cordinate')->all();
$colorse= $addDailyForecast->evening_polygons()->pluck('color')->all();
$polygonIde = $addDailyForecast->evening_polygons()->pluck('polygonId')->all();
foreach ($polygonnse as $index => $polygon) {
    $polugonne = [
      'polygonId' => $polygonIde[$index],
      'polygon' =>  $polygon,
      'color' => $colorse[$index],
]; 
$polugone[] = $polugonne;
}

$this->polygonsE =$polugone;

// get the markers
$markerse = [];
$markerslate = $addDailyForecast->evening_markers()->pluck('lat')->all();
$markerslnge = $addDailyForecast->evening_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->evening_markers()->pluck('icontype')->all();
$markerIdse = $addDailyForecast->evening_markers()->pluck('markerId')->all();
foreach ($markerIdse as $index => $markerId) {
    $markere = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslnge[$index],
            'lat' => $markerslate[$index],
        ],
        'icontype' => $icontype[$index],
    ];

    $markerse[] = $markere;
}

$this->markersE = $markerse;


  $time = $this->getTimeOfDay($addDailyForecast->created_at);
 $morningDate = $addDailyForecast->morning_general_variables()->first();
 $afternoonDate = $addDailyForecast->afternoon_general_variables()->first();
 $eveningDate = $addDailyForecast->evening_general_variables()->first();


 $temperatureData = DB::table('morning_table_values')
 ->join('cafodistricts', 'morning_table_values.districts', '=', 'cafodistricts.districtname')
 ->orWhere(function ($query) {
     $query->join('afternoon_table_values', 'afternoon_table_values.districts', '=', 'cafodistricts.districtname') ;

 })
 ->orWhere(function ($query) {
     $query->join('evening_table_values', 'evening_table_values.districts', '=', 'cafodistricts.districtname');
 })
 ->where('morning_table_values.add_daily_forecast_id', '=', $id)
    // ->orWhere(function ($query) use ($id) {
    //     $query->where('afternoon_table_values.add_daily_forecast_id', '=', $id);
    // })
    // ->orWhere(function ($query) use ($id) {
    //     $query->where('eveningTablevalues.add_daily_forecast_id', '=', $id);
    // })

 ->select('cafodistricts.districtZone', DB::raw('MIN(morning_table_values.min_temp) as minTemp'), DB::raw('MAX(morning_table_values.max_temp) as maxTemp'))
 ->groupBy('cafodistricts.districtZone')
 ->get();

//  dd($temperatureData);

// exit();


        return view('admin.cafoMapForecastTemplate',
        ['polygonM' => $this->polygonsM,
        'polygonA' => $this->polygonsA,
        'polygonE' => $this->polygonsE,
        'markersM' => $this->markersM,
        'markersA' => $this->markersA,
        'markersE' => $this->markersE,
        'addDailyForecast' => $addDailyForecast,
        'time' => $time,
        'morningDate' => $morningDate,
        'afternoonDate' => $afternoonDate,
         'eveningDate' => $eveningDate,
         'temperatureData' => $temperatureData

            ]);

     
    }

   public function editMap(Request $request) {
    $data = $request->all();
    $mapMorningDate = $data[0]['mapdates']['morningdatee'];
    $mapAfternoonDate = $data[0]['mapdates']['afternoondatee'];
    $mapEveningDate = $data[0]['mapdates']['eveningdatee'];
    $markersMorning = $data[0]['markerss']['markersmor'];
    $markersAfternoon = $data[0]['markerss']['markersaf'];
    $markersEvening = $data[0]['markerss']['markersev'];
    $ploygonsMorning = $data[0]['polygons']['ploygonsmorning'];
    $ploygonsAfternoon = $data[0]['polygons']['ploygonsafternoon'];
    $ploygonsEvening = $data[0]['polygons']['ploygonsevening'];
    $id = $data[0]['mapdates']['forid'];
    
    $add_daily_forecasts = AddDailyForecast::where('id', $id)->where('publishType', 'Publish-Forecast')->first();
    MorningMarkers::where("add_daily_forecast_id", $id)->delete();
    AfternoonMarkers::where("add_daily_forecast_id", $id)->delete();
    EveningMarkers::where("add_daily_forecast_id", $id)->delete();
    MorningPolygon::where("add_daily_forecast_id", $id)->delete();
    AfternoonPolygon::where("add_daily_forecast_id", $id)->delete();
    EveningPolygon::where("add_daily_forecast_id", $id)->delete();




 // Create a new instance of morning_markers
 foreach ($markersMorning as $item) {
    $morning_markers = new MorningMarkers();
    $morning_markers->markerId = $item['id'];
    $morning_markers->add_daily_forecast_id = $id;
    $morning_markers->morningDate = $mapMorningDate;
    $morning_markers->icontype = $item['icontype'];
    $morning_markers->lng = $item['lnglat']['lng'];
    $morning_markers->lat = $item['lnglat']['lat'];
    $add_daily_forecasts->morning_markers()->save($morning_markers);
    

}


 // Create a new instance of afternoon_markers
 foreach ($markersAfternoon as $item) {
    $afternoon_markers = new AfternoonMarkers();
    $afternoon_markers->markerId = $item['id'];
    $afternoon_markers->add_daily_forecast_id = $id;
    $afternoon_markers->afternoonDate = $mapAfternoonDate;
    $afternoon_markers->icontype = $item['icontype'];
    $afternoon_markers->lng = $item['lnglat']['lng'];
    $afternoon_markers->lat = $item['lnglat']['lat'];
    $add_daily_forecasts->afternoon_markers()->save($afternoon_markers);
}



// Create a new instance of evening_markers
foreach ($markersEvening as $item) {
    $evening_markers = new EveningMarkers();
    $evening_markers->markerId = $item['id'];
    $evening_markers->add_daily_forecast_id = $id;
    $evening_markers->eveningDate = $mapEveningDate;
    $evening_markers->icontype = $item['icontype'];
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
    $morning_polygons->add_daily_forecast_id = $id;
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
    $afternoon_polygons->add_daily_forecast_id = $id;
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
    $evening_polygons->add_daily_forecast_id = $id;
    $evening_polygons->eveningDate = $mapEveningDate;
    $evening_polygons->color = $item['color'];
    $evening_polygons->cordinate = json_encode($item['cordinates']); 
    $add_daily_forecasts->evening_polygons()->save($evening_polygons);
}
 }


         // Return a response to indicate success
       

   }

 public function editSummary(Request $request) {
$data = $request->all();
$id = $data['forid'];
$summary = $data['summary'];

   AddDailyForecast::where('id', $id)->where('publishType', 'Publish-Forecast')->update([
'summary' => $summary ]); 
 
  return response('Form submitted successfully', 200);
}
}
