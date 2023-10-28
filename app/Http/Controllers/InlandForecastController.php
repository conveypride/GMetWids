<?php

namespace App\Http\Controllers;

use App\Models\Inland_Afternoon_general_variables;
use App\Models\Inland_Afternoon_table_values;
use App\Models\Inland_AfternoonMarkers;
use App\Models\Inland_AfternoonPolygon;
use App\Models\Inland_Evening_general_variables;
use App\Models\Inland_Evening_table_values;
use App\Models\Inland_EveningMarkers;
use App\Models\Inland_EveningPolygon;
use App\Models\Inland_Morning_general_variables;
use App\Models\Inland_Morning_table_values;
use App\Models\Inland_MorningMarkers;
use App\Models\Inland_MorningPolygon;
use App\Models\InlandForecast;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class InlandForecastController extends Controller
{

   public $time = [];
    public $polygons = [];
    public $polygonsM = [];
    public $polygonsA = [];
    public $polygonsE = [];
    public $markers = [];
    public $markersM = [];
    public $markersA = [];
    public $markersE = [];

    //
    public function index()
    {
        $inlandforecast = InlandForecast::orderByDesc('created_at')->get();
    
    return view('admin.inlandForecast', ['inlandforecasts' => $inlandforecast]);
    }


   //add new inland forecast
   public function addNewIf()
   {
       $districts = DB::table('marine_districts')->orderBy('districtname')->get();
       // dd($districts);
   return view('admin.addNewInlandForecast', ['districts' => $districts]);
   }


   public function create(Request $request)
   {
       // $randomId  = $this->generateRandomId();
       $data = $request->all();
       $tableMorningDate = $data[0]['dateMinMaxTempValues'][0];
       $tableMinTempMorning =  $data[0]['dateMinMaxTempValues'][1];
       $tableMaxTempMorning =  $data[0]['dateMinMaxTempValues'][2];
       // $tablePressureMorning =  $data[0]['dateMinMaxTempValues'][2];
       $tableAfternoonDate = $data[0]['dateMinMaxTempValues'][3];
       $tableMinTempAfternoon =  $data[0]['dateMinMaxTempValues'][4];
       $tableMaxTempAfternoon =  $data[0]['dateMinMaxTempValues'][5];
       // $tablePressureAfternoon =  $data[0]['dateMinMaxTempValues'][4];
       $tableEveningDate = $data[0]['dateMinMaxTempValues'][6];
       $tableMinTempEvening  =  $data[0]['dateMinMaxTempValues'][7];
       $tableMaxTempEvening  =  $data[0]['dateMinMaxTempValues'][8];
       // $tablePressureEvening=  $data[0]['dateMinMaxTempValues'][8];
       $tableMorningValues = $data[0]['tableValues']['inlandmorningValues'];
       $tableAfternoonValues = $data[0]['tableValues']['inlandafternoonValues'];
       $tableEveningValues = $data[0]['tableValues']['inlandeveningValues'];
       $mapMorningDate = $data[0]['mapdates']['morningdate'];
       $mapAfternoonDate = $data[0]['mapdates']['afternoondate'];
       $mapEveningDate = $data[0]['mapdates']['eveningdate'];

       $i24hoursurfacewind = $data[0]['mapdates']['i24hoursurfacewind'];
       $i24hourvisibility = $data[0]['mapdates']['i24hourvisibility'];
       $i24hourtemp = $data[0]['mapdates']['i24hourtemp'];
       $i48hoursurfacewind = $data[0]['mapdates']['i48hoursurfacewind'];
       $i48hourvisibility = $data[0]['mapdates']['i48hourvisibility'];
       $i48hourtemp = $data[0]['mapdates']['i48hourtemp'];

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

       
// Create a new instance of add_inland_forecasts
$add_inland_forecasts = new InlandForecast();
$add_inland_forecasts->publishType = $publishType ;
$add_inland_forecasts->creator =  Auth::user()->name;
$add_inland_forecasts->scheduledate= $scheduledate;
$add_inland_forecasts->summary =  $summary;
$add_inland_forecasts->textareaweatherwarning = $textareaweatherwarning;
$add_inland_forecasts->warningtype = $warningtype;
$add_inland_forecasts->i24hoursurfacewind = $i24hoursurfacewind;
$add_inland_forecasts->i24hourvisibility = $i24hourvisibility;
$add_inland_forecasts->i24hourtemp = $i24hourtemp;
$add_inland_forecasts->i48hoursurfacewind = $i48hoursurfacewind;
$add_inland_forecasts->i48hourvisibility = $i48hourvisibility;
$add_inland_forecasts->i48hourtemp = $i48hourtemp;
$add_inland_forecasts->save();

 // Create a new instance of morning_general_variables
 $morning_general_variables = new Inland_Morning_general_variables();
//   $morning_general_variables->id = $randomId;
 $morning_general_variables->date = $tableMorningDate;
//   $morning_general_variables->pressure= $tablePressureMorning;
 $morning_general_variables->min_temp = Str::upper($tableMinTempMorning);
 $morning_general_variables->max_temp = Str::upper($tableMaxTempMorning);
 $add_inland_forecasts->inlandmorning_general_variables()->save($morning_general_variables);

// Create a new instance of afternoon_general_variables
$afternoon_general_variables = new Inland_Afternoon_general_variables();
//  $afternoon_general_variables->id = $randomId;
$afternoon_general_variables->date = $tableAfternoonDate;
//  $afternoon_general_variables->pressure= $tablePressureAfternoon;
$afternoon_general_variables->min_temp = Str::upper($tableMinTempAfternoon);
$afternoon_general_variables->max_temp = Str::upper($tableMaxTempAfternoon);
$add_inland_forecasts->inlandafternoon_general_variables()->save($afternoon_general_variables);


// Create a new instance of evening_general_variables
$evening_general_variables = new Inland_Evening_general_variables();
//  $evening_general_variables->id = $randomId;
$evening_general_variables->date = $tableEveningDate;
//  $evening_general_variables->pressure= $tablePressureEvening;
$evening_general_variables->min_temp = Str::upper($tableMinTempEvening );
$evening_general_variables->max_temp = Str::upper($tableMaxTempEvening );
$add_inland_forecasts->inlandevening_general_variables()->save($evening_general_variables);
// Create a new instance of morning_table_values
foreach ($tableMorningValues as $item) {
   $district = $item['districts'];
   $values = $item['values'];
   $morning_table_values = new Inland_Morning_table_values();
   $morning_table_values->districts = $district; 
   $morning_table_values->wind = $values[0];
   $morning_table_values->weather = $values[1]; 
   $morning_table_values->morningDate = $tableMorningDate;
   $morning_table_values->forecaster = Auth::user()->name;

  $add_inland_forecasts->inlandmorning_table_values()->save($morning_table_values);
}

// Create a new instance of afternoon_table_values
foreach ($tableAfternoonValues as $item) {
   $district = $item['districts'];
   $values = $item['values'];
   $afternoon_table_values = new Inland_Afternoon_table_values();
   $afternoon_table_values->districts = $district; 
   $afternoon_table_values->wind = $values[0];
   $afternoon_table_values->weather = $values[1]; 
   $afternoon_table_values->afternoonDate = $tableAfternoonDate;
   $afternoon_table_values->forecaster = Auth::user()->name;

   $add_inland_forecasts->inlandafternoon_table_values()->save($afternoon_table_values);
 
}

// Create a new instance of evening_table_values
foreach ($tableEveningValues as $item) {
   $district = $item['districts'];
   $values = $item['values'];
   $evening_table_values = new Inland_Evening_table_values();
   $evening_table_values->districts = $district; 
   $evening_table_values->wind = $values[0];
   $evening_table_values->weather = $values[1]; 
   $evening_table_values->eveningDate = $tableEveningDate;
   $evening_table_values->forecaster = Auth::user()->name;
   $add_inland_forecasts->inlandevening_table_values()->save($evening_table_values);
}


// Create a new instance of morning_markers
foreach ($markersMorning as $item) {
   $morning_markers = new Inland_MorningMarkers();
   $morning_markers->markerId = $item['id'];
   $morning_markers->morningDate = $mapMorningDate;
   $morning_markers->icontype = $item['icontype'];
   $morning_markers->lng = $item['lnglat']['lng'];
   $morning_markers->lat = $item['lnglat']['lat'];
   $add_inland_forecasts->inlandmorning_markers()->save($morning_markers);
   
}


// Create a new instance of afternoon_markers
foreach ($markersAfternoon as $item) {
   $afternoon_markers = new Inland_AfternoonMarkers();
   $afternoon_markers->markerId = $item['id'];
   $afternoon_markers->afternoonDate = $mapAfternoonDate;
   $afternoon_markers->icontype = $item['icontype'];
   $afternoon_markers->lng = $item['lnglat']['lng'];
   $afternoon_markers->lat = $item['lnglat']['lat'];
   $add_inland_forecasts->inlandafternoon_markers()->save($afternoon_markers);
}



// Create a new instance of evening_markers
foreach ($markersEvening as $item) {
   $evening_markers = new Inland_EveningMarkers();
   $evening_markers->markerId = $item['id'];
   $evening_markers->eveningDate = $mapEveningDate;
   $evening_markers->icontype = $item['icontype'];
   $evening_markers->lng = $item['lnglat']['lng'];
   $evening_markers->lat = $item['lnglat']['lat'];
   $add_inland_forecasts->inlandevening_markers()->save($evening_markers);
   // $evening_markers->save();
}

// Create a new instance of morning_polygons
if(!empty($ploygonsMorning)){
    foreach ($ploygonsMorning as $item) {
   $morning_polygons = new Inland_MorningPolygon();
   $morning_polygons->polygonId = $item['id'];
   $morning_polygons->morningDate =  $mapMorningDate;
   $morning_polygons->color = $item['color'];
   $morning_polygons->cordinate = json_encode($item['cordinates']); 
   $add_inland_forecasts->inlandmorning_polygons()->save($morning_polygons);
}
}



// Create a new instance of afternoon_polygons
if(!empty($ploygonsAfternoon)){
foreach ($ploygonsAfternoon as $item) {
   $afternoon_polygons = new Inland_AfternoonPolygon();
   $afternoon_polygons->polygonId = $item['id'];
   $afternoon_polygons->afternoonDate = $mapAfternoonDate;
   $afternoon_polygons->color = $item['color'];
   $afternoon_polygons->cordinate = json_encode($item['cordinates']); 
   $add_inland_forecasts->inlandafternoon_polygons()->save($afternoon_polygons);
}
}
// Create a new instance of evening_polygons
if(!empty($ploygonsEvening)){
foreach ($ploygonsEvening as $item) {
   $evening_polygons = new Inland_EveningPolygon();
   $evening_polygons->polygonId = $item['id'];
   $evening_polygons->eveningDate = $mapEveningDate;
   $evening_polygons->color = $item['color'];
   $evening_polygons->cordinate = json_encode($item['cordinates']); 
   $add_inland_forecasts->inlandevening_polygons()->save($evening_polygons);
}
}

 
        // Return a response to indicate success
 return response('Form submitted successfully', 200);
  
   }


   
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




   
   public function viewinlandforecast($id)
   {
       
       $inlandforecast = inlandForecast::where('id', $id)->first();
       $morning = $inlandforecast->inlandmorning_table_values()->get();
       $afternoon = $inlandforecast->inlandafternoon_table_values()->get();
       $evening =  $inlandforecast->inlandevening_table_values()->get(); 
       $inlandmorningGen =  $inlandforecast->inlandmorning_general_variables()->first(); 
       $inlandafternoonGen =  $inlandforecast->inlandafternoon_general_variables()->first(); 
       $inlandeveningGen =  $inlandforecast->inlandevening_general_variables()->first(); 

       $time = $this->getTimeOfDay($inlandforecast->created_at);

   return view('admin.inlandTemplate',compact('time','morning','afternoon','evening', 'inlandforecast', 'inlandeveningGen', 'inlandafternoonGen', 'inlandmorningGen'));
   }

public function viewinlandforecastMap($id)
   {
    
        //  ====================morning map for viewall map==================
    // now get the parent id from the addDailyForecast table
    $addDailyForecast = inlandForecast::where('id', $id)->first();
    // now get the map details 
    $polugonm = [];
    $polygonnsm=  $addDailyForecast->inlandmorning_polygons()->pluck('cordinate')->all();
  $colorsm= $addDailyForecast->inlandmorning_polygons()->pluck('color')->all();
  $polygonIdm = $addDailyForecast->inlandmorning_polygons()->pluck('polygonId')->all();
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
  $markerslatm = $addDailyForecast->inlandmorning_markers()->pluck('lat')->all();
  $markerslngm = $addDailyForecast->inlandmorning_markers()->pluck('lng')->all();
  $icontypem = $addDailyForecast->inlandmorning_markers()->pluck('icontype')->all();
  $markerIdsm = $addDailyForecast->inlandmorning_markers()->pluck('markerId')->all();
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
  $polygonnsa=  $addDailyForecast->inlandafternoon_polygons()->pluck('cordinate')->all();
$colorsa= $addDailyForecast->inlandafternoon_polygons()->pluck('color')->all();
$polygonIda = $addDailyForecast->inlandafternoon_polygons()->pluck('polygonId')->all();
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
$markerslata = $addDailyForecast->inlandafternoon_markers()->pluck('lat')->all();
$markerslnga = $addDailyForecast->inlandafternoon_markers()->pluck('lng')->all();
$icontypea = $addDailyForecast->inlandafternoon_markers()->pluck('icontype')->all();
$markerIdsa = $addDailyForecast->inlandafternoon_markers()->pluck('markerId')->all();
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
  $polygonnse=  $addDailyForecast->inlandevening_polygons()->pluck('cordinate')->all();
$colorse= $addDailyForecast->inlandevening_polygons()->pluck('color')->all();
$polygonIde = $addDailyForecast->inlandevening_polygons()->pluck('polygonId')->all();
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
$markerslate = $addDailyForecast->inlandevening_markers()->pluck('lat')->all();
$markerslnge = $addDailyForecast->inlandevening_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->inlandevening_markers()->pluck('icontype')->all();
$markerIdse = $addDailyForecast->inlandevening_markers()->pluck('markerId')->all();
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
 $morningDate = $addDailyForecast->inlandmorning_general_variables()->first();
 $afternoonDate = $addDailyForecast->inlandafternoon_general_variables()->first();
 $eveningDate = $addDailyForecast->inlandevening_general_variables()->first();


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


        return view('admin.inlandmapForecastTemp',
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




}


