<?php

namespace App\Http\Controllers;

use App\Models\AddDailyForecast;
use App\Models\Afternoon_general_variables;
use App\Models\Evening_general_variables;
use App\Models\Morning_general_variables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class Userhome extends Controller
{

    public  $currentConditionItd;
    public  $currentConditionRH;
    public $currentConditionRain;
    public $period;
    public $minTemp;
    public $maxTemp;
    public $wind;
    public $district;
    public $weather;
    public $winddir;
    public $latestGeneralData;
    public $polygons = [];
    public $markers = [];
    public $time = [];
    
public function timeOfDay()
    {
        $currentTime = date('H:i');
    
        if ($currentTime >= '00:00' && $currentTime < '12:00') {
            $this->time = 'Morning';
            return 'Morning';
        } elseif ($currentTime >= '12:00' && $currentTime < '18:00') {
            $this->time = 'Afternoon';
            return 'Afternoon';
        } else {
            $this->time = 'Evening';
            return 'Evening';
        }
    }

public function endsWith($string)
{
    $pattern = '/(S[EWN]?|E[NSW]?|N[ESW]?|W[SEN]?)/i';
    $matches = [];
    if (preg_match($pattern, strtoupper($string), $matches) === 1) {
        return $matches[0];
    }
    return null;
}





    //on page load
    public function index()
    {
        $whatthisIsIt = $this->timeOfDay();

        $districts = DB::table('cafodistricts')->orderBy('districtname')->get();
        

        // NOW GET THE CONDITIONS BY TIME OF THE DAY
if($whatthisIsIt == 'Morning'){
// get the latest morning forecast from the morning_general_variables table
$latestMorningForecastId = Morning_general_variables::whereDate('date', today())->latest('created_at')->value('add_daily_forecast_id');
// dd($latestAfternoonForecastId);
if(!is_null($latestMorningForecastId)){
// now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestMorningForecastId);

//  now i can acess all the morning date from all the morning table in mysql
$this->latestGeneralData =  $addDailyForecast->morning_general_variables();


    $this->currentConditionItd = $addDailyForecast->morning_general_variables()->value('itd');
    $this->currentConditionRH =   $addDailyForecast->morning_table_values()->where('districts', 'Accra')->value('humidity');
  $this->currentConditionRain =   $addDailyForecast->morning_table_values()->where('districts', 'Accra')->value('rain_chance');
  $this->minTemp =   $addDailyForecast->morning_table_values()->where('districts', 'Accra')->value('min_temp');
  $this->maxTemp =   $addDailyForecast->morning_table_values()->where('districts', 'Accra')->value('max_temp');
  $this->wind =   $addDailyForecast->morning_table_values()->where('districts', 'Accra')->value('wind');
  $this->district =  $addDailyForecast->morning_table_values()->where('districts', 'Accra')->value('districts');
 $this->weather =  $addDailyForecast->morning_table_values()->where('districts', 'Accra')->value('weather');
$this->winddir = $this->endsWith($this->wind);
  $this->period = "Morning(12:00AM - 5:59AM)UTC";
  $polugon = [];
  $polygonns=  $addDailyForecast->morning_polygons()->pluck('cordinate')->all();
$colors= $addDailyForecast->morning_polygons()->pluck('color')->all();
$polygonId = $addDailyForecast->morning_polygons()->pluck('polygonId')->all();
foreach ($polygonns as $index => $polygon) {
    $polugonn = [
      'polygonId' => $polygonId[$index],
      'polygon' =>  $polygon,
      'color' => $colors[$index],
]; 
$polugon[] = $polugonn;
}

$this->polygons =$polugon;
// get the markers
$markers = [];
$markerslat = $addDailyForecast->morning_markers()->pluck('lat')->all();
$markerslng = $addDailyForecast->morning_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->morning_markers()->pluck('icontype')->all();
$markerIds = $addDailyForecast->morning_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
    ];

    $markers[] = $marker;
}

$this->markers = $markers;



}else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    // get the latest morning forecast from the morning_general_variables table
$latestMorningForecastId = Morning_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('add_daily_forecast_id');
    // now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestMorningForecastId);

//  now i can acess all the morning date from all the morning table in mysql
$this->latestGeneralData =  $addDailyForecast->morning_general_variables();


    $this->currentConditionItd = $addDailyForecast->morning_general_variables()->value('itd');
    $this->currentConditionRH =   $addDailyForecast->morning_table_values()->where('districts', 'Accra')->value('humidity');
  $this->currentConditionRain =   $addDailyForecast->morning_table_values()->where('districts', 'Accra')->value('rain_chance');
  $this->minTemp =   $addDailyForecast->morning_table_values()->where('districts', 'Accra')->value('min_temp');
  $this->maxTemp =   $addDailyForecast->morning_table_values()->where('districts', 'Accra')->value('max_temp');
  $this->wind =   $addDailyForecast->morning_table_values()->where('districts', 'Accra')->value('wind');
  $this->district =  $addDailyForecast->morning_table_values()->where('districts', 'Accra')->value('districts');
 $this->weather =  $addDailyForecast->morning_table_values()->where('districts', 'Accra')->value('weather');
$this->winddir = $this->endsWith($this->wind);
  $this->period = "Morning(12:00AM - 5:59AM)UTC";
  $polugon = [];
  $polygonns=  $addDailyForecast->morning_polygons()->pluck('cordinate')->all();
$colors= $addDailyForecast->morning_polygons()->pluck('color')->all();
$polygonId = $addDailyForecast->morning_polygons()->pluck('polygonId')->all();
foreach ($polygonns as $index => $polygon) {
    $polugonn = [
      'polygonId' => $polygonId[$index],
      'polygon' =>  $polygon,
      'color' => $colors[$index],
]; 
$polugon[] = $polugonn;
}

$this->polygons =$polugon;
// get the markers
$markers = [];
$markerslat = $addDailyForecast->morning_markers()->pluck('lat')->all();
$markerslng = $addDailyForecast->morning_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->morning_markers()->pluck('icontype')->all();
$markerIds = $addDailyForecast->morning_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
    ];

    $markers[] = $marker;
}

$this->markers = $markers;


}
}else if($whatthisIsIt == 'Afternoon'){
// get the latest Afternoon forecast from the afternoon_general_variables table
$latestAfternoonForecastId = Afternoon_general_variables::whereDate('date', today())->latest('created_at')->value('add_daily_forecast_id');
// dd($latestAfternoonForecastId);
if(!is_null($latestAfternoonForecastId)){
// now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestAfternoonForecastId);

//  now i can acess all the afternoon date from all the afternoon table in mysql
$this->latestGeneralData =  $addDailyForecast->afternoon_general_variables();


    $this->currentConditionItd = $addDailyForecast->afternoon_general_variables()->value('itd');
    $this->currentConditionRH =   $addDailyForecast->afternoon_table_values()->where('districts', 'Accra')->value('humidity');
  $this->currentConditionRain =   $addDailyForecast->afternoon_table_values()->where('districts', 'Accra')->value('rain_chance');
  $this->minTemp =   $addDailyForecast->afternoon_table_values()->where('districts', 'Accra')->value('min_temp');
  $this->maxTemp =   $addDailyForecast->afternoon_table_values()->where('districts', 'Accra')->value('max_temp');
  $this->wind =   $addDailyForecast->afternoon_table_values()->where('districts', 'Accra')->value('wind');
  $this->district =  $addDailyForecast->afternoon_table_values()->where('districts', 'Accra')->value('districts');
 $this->weather =  $addDailyForecast->afternoon_table_values()->where('districts', 'Accra')->value('weather');
$this->winddir = $this->endsWith($this->wind);
  $this->period = "Afternoon(12:00PM - 5:59PM)UTC";

$polugon = [];
  $polygonns=  $addDailyForecast->afternoon_polygons()->pluck('cordinate')->all();
$colors= $addDailyForecast->afternoon_polygons()->pluck('color')->all();
$polygonId = $addDailyForecast->afternoon_polygons()->pluck('polygonId')->all();
foreach ($polygonns as $index => $polygon) {
    $polugonn = [
      'polygonId' => $polygonId[$index],
      'polygon' =>  $polygon,
      'color' => $colors[$index],
]; 
$polugon[] = $polugonn;
}

$this->polygons =$polugon;

// get the markers
$markers = [];
$markerslat = $addDailyForecast->afternoon_markers()->pluck('lat')->all();
$markerslng = $addDailyForecast->afternoon_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->afternoon_markers()->pluck('icontype')->all();
$markerIds = $addDailyForecast->afternoon_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
    ];

    $markers[] = $marker;
}

$this->markers = $markers;

}else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    $latestAfternoonForecastId = Afternoon_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('add_daily_forecast_id');
    // now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestAfternoonForecastId);

//  now i can acess all the afternoon date from all the afternoon table in mysql
$this->latestGeneralData =  $addDailyForecast->afternoon_general_variables();


    $this->currentConditionItd = $addDailyForecast->afternoon_general_variables()->value('itd');
    $this->currentConditionRH =   $addDailyForecast->afternoon_table_values()->where('districts', 'Accra')->value('humidity');
  $this->currentConditionRain =   $addDailyForecast->afternoon_table_values()->where('districts', 'Accra')->value('rain_chance');
  $this->minTemp =   $addDailyForecast->afternoon_table_values()->where('districts', 'Accra')->value('min_temp');
  $this->maxTemp =   $addDailyForecast->afternoon_table_values()->where('districts', 'Accra')->value('max_temp');
  $this->wind =   $addDailyForecast->afternoon_table_values()->where('districts', 'Accra')->value('wind');
  $this->district =  $addDailyForecast->afternoon_table_values()->where('districts', 'Accra')->value('districts');
 $this->weather =  $addDailyForecast->afternoon_table_values()->where('districts', 'Accra')->value('weather');
$this->winddir = $this->endsWith($this->wind);
  $this->period = "Afternoon(12:00PM - 5:59PM)UTC";
  
$polugon = [];
$polygonns=  $addDailyForecast->afternoon_polygons()->pluck('cordinate')->all();
$colors= $addDailyForecast->afternoon_polygons()->pluck('color')->all();
$polygonId = $addDailyForecast->afternoon_polygons()->pluck('polygonId')->all();
foreach ($polygonns as $index => $polygon) {
  $polugonn = [
    'polygonId' => $polygonId[$index],
    'polygon' =>  $polygon,
    'color' => $colors[$index],
]; 
$polugon[] = $polugonn;
}

$this->polygons =$polugon;
// get the markers
$markers = [];
$markerslat = $addDailyForecast->afternoon_markers()->pluck('lat')->all();
$markerslng = $addDailyForecast->afternoon_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->afternoon_markers()->pluck('icontype')->all();
$markerIds = $addDailyForecast->afternoon_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
    ];

    $markers[] = $marker;
}

$this->markers = $markers;

}



}else if($whatthisIsIt == 'Evening'){
// get the latest Evening forecast from the evening_general_variables table
$latestEveningForecastId = Evening_general_variables::whereDate('date', today())->latest('created_at')->value('add_daily_forecast_id');
// dd($latestAfternoonForecastId);
if(!is_null($latestEveningForecastId)){
// now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestEveningForecastId);

//  now i can acess all the evening date from all the evening table in mysql
$this->latestGeneralData =  $addDailyForecast->evening_general_variables();


    $this->currentConditionItd = $addDailyForecast->evening_general_variables()->value('itd');
    $this->currentConditionRH =   $addDailyForecast->evening_table_values()->where('districts', 'Accra')->value('humidity');
  $this->currentConditionRain =   $addDailyForecast->evening_table_values()->where('districts', 'Accra')->value('rain_chance');
  $this->minTemp =   $addDailyForecast->evening_table_values()->where('districts', 'Accra')->value('min_temp');
  $this->maxTemp =   $addDailyForecast->evening_table_values()->where('districts', 'Accra')->value('max_temp');
  $this->wind =   $addDailyForecast->evening_table_values()->where('districts', 'Accra')->value('wind');
  $this->district =  $addDailyForecast->evening_table_values()->where('districts', 'Accra')->value('districts');
 $this->weather =  $addDailyForecast->evening_table_values()->where('districts', 'Accra')->value('weather');
$this->winddir = $this->endsWith($this->wind);
  $this->period = "Evening(6:00PM - 11:59PM)UTC";

$polugon = [];
  $polygonns=  $addDailyForecast->evening_polygons()->pluck('cordinate')->all();
$colors= $addDailyForecast->evening_polygons()->pluck('color')->all();
$polygonId = $addDailyForecast->evening_polygons()->pluck('polygonId')->all();
foreach ($polygonns as $index => $polygon) {
    $polugonn = [
      'polygonId' => $polygonId[$index],
      'polygon' =>  $polygon,
      'color' => $colors[$index],
]; 
$polugon[] = $polugonn;
}

$this->polygons =$polugon;

// get the markers
$markers = [];
$markerslat = $addDailyForecast->evening_markers()->pluck('lat')->all();
$markerslng = $addDailyForecast->evening_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->evening_markers()->pluck('icontype')->all();
$markerIds = $addDailyForecast->evening_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
    ];

    $markers[] = $marker;
}

$this->markers = $markers;


}else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    // get the yesterday Evening forecast from the evening_general_variables table
$latestEveningForecastId = Evening_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('add_daily_forecast_id');
    // now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestEveningForecastId);

//  now i can acess all the evening date from all the evening table in mysql
$this->latestGeneralData =  $addDailyForecast->evening_general_variables();


    $this->currentConditionItd = $addDailyForecast->evening_general_variables()->value('itd');
    $this->currentConditionRH =   $addDailyForecast->evening_table_values()->where('districts', 'Accra')->value('humidity');
  $this->currentConditionRain =   $addDailyForecast->evening_table_values()->where('districts', 'Accra')->value('rain_chance');
  $this->minTemp =   $addDailyForecast->evening_table_values()->where('districts', 'Accra')->value('min_temp');
  $this->maxTemp =   $addDailyForecast->evening_table_values()->where('districts', 'Accra')->value('max_temp');
  $this->wind =   $addDailyForecast->evening_table_values()->where('districts', 'Accra')->value('wind');
  $this->district =  $addDailyForecast->evening_table_values()->where('districts', 'Accra')->value('districts');
 $this->weather =  $addDailyForecast->evening_table_values()->where('districts', 'Accra')->value('weather');
$this->winddir = $this->endsWith($this->wind);
  $this->period = "Evening(6:00PM - 11:59PM)UTC";
 
$polugon = [];
$polygonns=  $addDailyForecast->evening_polygons()->pluck('cordinate')->all();
$colors= $addDailyForecast->evening_polygons()->pluck('color')->all();
$polygonId = $addDailyForecast->evening_polygons()->pluck('polygonId')->all();
foreach ($polygonns as $index => $polygon) {
  $polugonn = [
    'polygonId' => $polygonId[$index],
    'polygon' =>  $polygon,
    'color' => $colors[$index],
]; 
$polugon[] = $polugonn;
}

$this->polygons =$polugon;
 
// get the markers
$markers = [];
$markerslat = $addDailyForecast->evening_markers()->pluck('lat')->all();
$markerslng = $addDailyForecast->evening_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->evening_markers()->pluck('icontype')->all();
$markerIds = $addDailyForecast->evening_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
    ];

    $markers[] = $marker;
}

$this->markers = $markers;
 

}
}

//24HRS  get the latest forecast from the morning_general_variables table
$latestForecastIdM = Morning_general_variables::whereDate('date', today())->latest('created_at')->value('add_daily_forecast_id');
if( !is_null($latestForecastIdM)){
//24HRS now get the parent id from the addDailyForecast table
$addDailyForecastM = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestForecastIdM);
$minTempM =   $addDailyForecastM->morning_table_values()->where('districts', 'Accra')->value('min_temp');
$maxTempM =   $addDailyForecastM->morning_table_values()->where('districts', 'Accra')->value('max_temp');
$windM =   $addDailyForecastM->morning_table_values()->where('districts', 'Accra')->value('wind');
$weatherM =  $addDailyForecastM->morning_table_values()->where('districts', 'Accra')->value('weather');
$winddirM = $this->endsWith($windM);
}else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    //24HRS  get the latest forecast from the morning_general_variables table
$latestForecastIdM = Morning_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('add_daily_forecast_id');
    //24HRS now get the parent id from the addDailyForecast table
$addDailyForecastM = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestForecastIdM);
$minTempM =   $addDailyForecastM->morning_table_values()->where('districts', 'Accra')->value('min_temp');
$maxTempM =   $addDailyForecastM->morning_table_values()->where('districts', 'Accra')->value('max_temp');
$windM =   $addDailyForecastM->morning_table_values()->where('districts', 'Accra')->value('wind');
$weatherM =  $addDailyForecastM->morning_table_values()->where('districts', 'Accra')->value('weather');
$winddirM = $this->endsWith($windM);
}



// =================================================afternoon=========================================
//24HRS  get the latest forecast from the morning_general_variables table
$latestForecastIdA = Afternoon_general_variables::whereDate('date', today())->latest('created_at')->value('add_daily_forecast_id');
if( !is_null($latestForecastIdA)){
//24HRS now get the parent id from the addDailyForecast table
$addDailyForecastA = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestForecastIdA);
$minTempA =   $addDailyForecastA->afternoon_table_values()->where('districts', 'Accra')->value('min_temp');
$maxTempA =   $addDailyForecastA->afternoon_table_values()->where('districts', 'Accra')->value('max_temp');
$windA =   $addDailyForecastA->afternoon_table_values()->where('districts', 'Accra')->value('wind');
$weatherA =  $addDailyForecastA->afternoon_table_values()->where('districts', 'Accra')->value('weather');
$winddirA = $this->endsWith($windA);
}// else use yesterday's forecast
else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    //24HRS  get the latest forecast from the morning_general_variables table
$latestForecastIdA = Afternoon_general_variables::whereDate('date',  $yesterday)->latest('created_at')->value('add_daily_forecast_id');
    //24HRS now get the parent id from the addDailyForecast table
$addDailyForecastA = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestForecastIdA);
$minTempA =   $addDailyForecastA->afternoon_table_values()->where('districts', 'Accra')->value('min_temp');
$maxTempA =   $addDailyForecastA->afternoon_table_values()->where('districts', 'Accra')->value('max_temp');
$windA =   $addDailyForecastA->afternoon_table_values()->where('districts', 'Accra')->value('wind');
$weatherA =  $addDailyForecastA->afternoon_table_values()->where('districts', 'Accra')->value('weather');
$winddirA = $this->endsWith($windA);
}
// =================================================EVENING=========================================
//24HRS  get the latest forecast from the evening_general_variables table
$latestForecastIdE = Evening_general_variables::whereDate('date', today())->latest('created_at')->value('add_daily_forecast_id');
// if today's evening table forecast is available
if( !is_null($latestForecastIdE)){
//24HRS now get the parent id from the addDailyForecast table
$addDailyForecastE = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestForecastIdE);
$minTempE =   $addDailyForecastE->evening_table_values()->where('districts', 'Accra')->value('min_temp');
$maxTempE =   $addDailyForecastE->evening_table_values()->where('districts', 'Accra')->value('max_temp');
$windE =   $addDailyForecastE->evening_table_values()->where('districts', 'Accra')->value('wind');
$weatherE =  $addDailyForecastE->evening_table_values()->where('districts', 'Accra')->value('weather');
$winddirE = $this->endsWith($windE);
}else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
//24HRS  get the latest forecast from the evening_general_variables table
$latestForecastIdE = Evening_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('add_daily_forecast_id');
    //24HRS now get the parent id from the addDailyForecast table
$addDailyForecastE = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestForecastIdE);
$minTempE =   $addDailyForecastE->evening_table_values()->where('districts', 'Accra')->value('min_temp');
$maxTempE =   $addDailyForecastE->evening_table_values()->where('districts', 'Accra')->value('max_temp');
$windE =   $addDailyForecastE->evening_table_values()->where('districts', 'Accra')->value('wind');
$weatherE =  $addDailyForecastE->evening_table_values()->where('districts', 'Accra')->value('weather');
$winddirE = $this->endsWith($windE);
}
// dd($this->polygons);
        return view('welcome', ['districts' => $districts, 
        'time' => $this->time,
        'addDailyForecast' => $addDailyForecast,
        'currentConditionItd' =>$this->currentConditionItd,
        'currentConditionRH' => $this->currentConditionRH,
        'currentConditionRain' => $this->currentConditionRain,
        'minTemp' => $this->minTemp,
        'maxTemp' => $this->maxTemp,
        'wind' => strtoupper($this->wind), 
        'district' =>  $this->district,
        'weather' => $this->weather,
        'winddir' => $this->winddir,
        'period' => $this->period,
        'polygon' => $this->polygons,
        'markers' => $this->markers,
        'weatherM' => $weatherM,
        'minTempM' => $minTempM,
        'maxTempM' => $maxTempM,
        'windM' => $windM,
        'winddirM' => $winddirM,
        'weatherA' => $weatherA,
        'minTempA' => $minTempA,
        'maxTempA' => $maxTempA,
        'windA' => $windA,
        'winddirA' => $winddirA,
        'weatherE' => $weatherE,
        'minTempE' => $minTempE,
        'maxTempE' => $maxTempE,
        'windE' => $windE,
        'winddirE' => $winddirE,
        
    ]);
    }



// on district changed
public function seeDetailsOfCity(Request $request, $city)
{
    $selectedCity = $city;
    $whatthisIsIt = $this->timeOfDay();

    $districts = DB::table('cafodistricts')->orderBy('districtname')->get();
    

    // NOW GET THE CONDITIONS BY TIME OF THE DAY
if($whatthisIsIt == 'Morning'){
// get the latest morning forecast from the morning_general_variables table
$latestMorningForecastId = Morning_general_variables::whereDate('date', today())->latest('created_at')->value('add_daily_forecast_id');
// if today's forecast can't be found
if(!is_null($latestMorningForecastId)){
// now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestMorningForecastId);

//  now i can acess all the morning date from all the morning table in mysql
$this->latestGeneralData =  $addDailyForecast->morning_general_variables();


$this->currentConditionItd = $addDailyForecast->morning_general_variables()->value('itd');
$this->currentConditionRH =   $addDailyForecast->morning_table_values()->where('districts', $selectedCity)->value('humidity');
$this->currentConditionRain =   $addDailyForecast->morning_table_values()->where('districts', $selectedCity)->value('rain_chance');
$this->minTemp =   $addDailyForecast->morning_table_values()->where('districts', $selectedCity)->value('min_temp');
$this->maxTemp =   $addDailyForecast->morning_table_values()->where('districts', $selectedCity)->value('max_temp');
$this->wind =   $addDailyForecast->morning_table_values()->where('districts', $selectedCity)->value('wind');
$this->district =  $addDailyForecast->morning_table_values()->where('districts', $selectedCity)->value('districts');
$this->weather =  $addDailyForecast->morning_table_values()->where('districts', $selectedCity)->value('weather');
$this->winddir = $this->endsWith($this->wind);
$this->period = "Morning(12:00AM - 5:59AM)UTC";
$polugon = [];
  $polygonns=  $addDailyForecast->morning_polygons()->pluck('cordinate')->all();
$colors= $addDailyForecast->morning_polygons()->pluck('color')->all();
$polygonId = $addDailyForecast->morning_polygons()->pluck('polygonId')->all();
foreach ($polygonns as $index => $polygon) {
    $polugonn = [
      'polygonId' => $polygonId[$index],
      'polygon' =>  $polygon,
      'color' => $colors[$index],
]; 
$polugon[] = $polugonn;
}

$this->polygons =$polugon;

// get the markers
$markers = [];
$markerslat = $addDailyForecast->morning_markers()->pluck('lat')->all();
$markerslng = $addDailyForecast->morning_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->morning_markers()->pluck('icontype')->all();
$markerIds = $addDailyForecast->morning_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
    ];

    $markers[] = $marker;
}

$this->markers = $markers;


}
// else use yesterday's forecast
else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    // get the latest morning forecast from the morning_general_variables table
$latestMorningForecastId = Morning_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('add_daily_forecast_id');
// now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestMorningForecastId);

//  now i can acess all the morning date from all the morning table in mysql
$this->latestGeneralData =  $addDailyForecast->morning_general_variables();


$this->currentConditionItd = $addDailyForecast->morning_general_variables()->value('itd');
$this->currentConditionRH =   $addDailyForecast->morning_table_values()->where('districts', $selectedCity)->value('humidity');
$this->currentConditionRain =   $addDailyForecast->morning_table_values()->where('districts', $selectedCity)->value('rain_chance');
$this->minTemp =   $addDailyForecast->morning_table_values()->where('districts', $selectedCity)->value('min_temp');
$this->maxTemp =   $addDailyForecast->morning_table_values()->where('districts', $selectedCity)->value('max_temp');
$this->wind =   $addDailyForecast->morning_table_values()->where('districts', $selectedCity)->value('wind');
$this->district =  $addDailyForecast->morning_table_values()->where('districts', $selectedCity)->value('districts');
$this->weather =  $addDailyForecast->morning_table_values()->where('districts', $selectedCity)->value('weather');
$this->winddir = $this->endsWith($this->wind);
$this->period = "Morning(12:00AM - 5:59AM)UTC";
$polugon = [];
  $polygonns=  $addDailyForecast->morning_polygons()->pluck('cordinate')->all();
$colors= $addDailyForecast->morning_polygons()->pluck('color')->all();
$polygonId = $addDailyForecast->morning_polygons()->pluck('polygonId')->all();
foreach ($polygonns as $index => $polygon) {
    $polugonn = [
      'polygonId' => $polygonId[$index],
      'polygon' =>  $polygon,
      'color' => $colors[$index],
]; 
$polugon[] = $polugonn;
}

$this->polygons =$polugon;

// get the markers
$markers = [];
$markerslat = $addDailyForecast->morning_markers()->pluck('lat')->all();
$markerslng = $addDailyForecast->morning_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->morning_markers()->pluck('icontype')->all();
$markerIds = $addDailyForecast->morning_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
    ];

    $markers[] = $marker;
}

$this->markers = $markers;


}
}else if($whatthisIsIt == 'Afternoon'){
// get the latest Afternoon forecast from the afternoon_general_variables table
$latestAfternoonForecastId = Afternoon_general_variables::whereDate('date', today())->latest('created_at')->value('add_daily_forecast_id');
// dd($latestAfternoonForecastId);
if(!is_null($latestAfternoonForecastId)){
// now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestAfternoonForecastId);

//  now i can acess all the afternoon date from all the afternoon table in mysql
$this->latestGeneralData =  $addDailyForecast->afternoon_general_variables();


$this->currentConditionItd = $addDailyForecast->afternoon_general_variables()->value('itd');
$this->currentConditionRH =   $addDailyForecast->afternoon_table_values()->where('districts', $selectedCity)->value('humidity');
$this->currentConditionRain =   $addDailyForecast->afternoon_table_values()->where('districts', $selectedCity)->value('rain_chance');
$this->minTemp =   $addDailyForecast->afternoon_table_values()->where('districts', $selectedCity)->value('min_temp');
$this->maxTemp =   $addDailyForecast->afternoon_table_values()->where('districts', $selectedCity)->value('max_temp');
$this->wind =   $addDailyForecast->afternoon_table_values()->where('districts', $selectedCity)->value('wind');
$this->district =  $addDailyForecast->afternoon_table_values()->where('districts', $selectedCity)->value('districts');
$this->weather =  $addDailyForecast->afternoon_table_values()->where('districts', $selectedCity)->value('weather');
$this->winddir = $this->endsWith($this->wind);
$this->period = "Afternoon(12:00PM - 5:59PM)UTC";

$polugon = [];
  $polygonns=  $addDailyForecast->afternoon_polygons()->pluck('cordinate')->all();
$colors= $addDailyForecast->afternoon_polygons()->pluck('color')->all();
$polygonId = $addDailyForecast->afternoon_polygons()->pluck('polygonId')->all();
foreach ($polygonns as $index => $polygon) {
    $polugonn = [
      'polygonId' => $polygonId[$index],
      'polygon' =>  $polygon,
      'color' => $colors[$index],
]; 
$polugon[] = $polugonn;
}

$this->polygons =$polugon;
// get the markers
$markers = [];
$markerslat = $addDailyForecast->afternoon_markers()->pluck('lat')->all();
$markerslng = $addDailyForecast->afternoon_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->afternoon_markers()->pluck('icontype')->all();
$markerIds = $addDailyForecast->afternoon_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
    ];

    $markers[] = $marker;
}

$this->markers = $markers;


}else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    // get the latest Afternoon forecast from the afternoon_general_variables table
$latestAfternoonForecastId = Afternoon_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('add_daily_forecast_id');
    // now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestAfternoonForecastId);

//  now i can acess all the afternoon date from all the afternoon table in mysql
$this->latestGeneralData =  $addDailyForecast->afternoon_general_variables();


$this->currentConditionItd = $addDailyForecast->afternoon_general_variables()->value('itd');
$this->currentConditionRH =   $addDailyForecast->afternoon_table_values()->where('districts', $selectedCity)->value('humidity');
$this->currentConditionRain =   $addDailyForecast->afternoon_table_values()->where('districts', $selectedCity)->value('rain_chance');
$this->minTemp =   $addDailyForecast->afternoon_table_values()->where('districts', $selectedCity)->value('min_temp');
$this->maxTemp =   $addDailyForecast->afternoon_table_values()->where('districts', $selectedCity)->value('max_temp');
$this->wind =   $addDailyForecast->afternoon_table_values()->where('districts', $selectedCity)->value('wind');
$this->district =  $addDailyForecast->afternoon_table_values()->where('districts', $selectedCity)->value('districts');
$this->weather =  $addDailyForecast->afternoon_table_values()->where('districts', $selectedCity)->value('weather');
$this->winddir = $this->endsWith($this->wind);
$this->period = "Afternoon(12:00PM - 5:59PM)UTC";

$polugon = [];
  $polygonns=  $addDailyForecast->afternoon_polygons()->pluck('cordinate')->all();
$colors= $addDailyForecast->afternoon_polygons()->pluck('color')->all();
$polygonId = $addDailyForecast->afternoon_polygons()->pluck('polygonId')->all();
foreach ($polygonns as $index => $polygon) {
    $polugonn = [
      'polygonId' => $polygonId[$index],
      'polygon' =>  $polygon,
      'color' => $colors[$index],
]; 
$polugon[] = $polugonn;
}

$this->polygons =$polugon;
// get the markers
$markers = [];
$markerslat = $addDailyForecast->afternoon_markers()->pluck('lat')->all();
$markerslng = $addDailyForecast->afternoon_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->afternoon_markers()->pluck('icontype')->all();
$markerIds = $addDailyForecast->afternoon_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
    ];

    $markers[] = $marker;
}

$this->markers = $markers;

}



}else if($whatthisIsIt == 'Evening'){
// get the latest Evening forecast from the evening_general_variables table
$latestEveningForecastId = Evening_general_variables::whereDate('date', today())->latest('created_at')->value('add_daily_forecast_id');
// dd($latestAfternoonForecastId);
if(!is_null($latestEveningForecastId)){
// now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestEveningForecastId);

//  now i can acess all the evening date from all the evening table in mysql
$this->latestGeneralData =  $addDailyForecast->evening_general_variables();


$this->currentConditionItd = $addDailyForecast->evening_general_variables()->value('itd');
$this->currentConditionRH =   $addDailyForecast->evening_table_values()->where('districts', $selectedCity)->value('humidity');
$this->currentConditionRain =   $addDailyForecast->evening_table_values()->where('districts', $selectedCity)->value('rain_chance');
$this->minTemp =   $addDailyForecast->evening_table_values()->where('districts', $selectedCity)->value('min_temp');
$this->maxTemp =   $addDailyForecast->evening_table_values()->where('districts', $selectedCity)->value('max_temp');
$this->wind =   $addDailyForecast->evening_table_values()->where('districts', $selectedCity)->value('wind');
$this->district =  $addDailyForecast->evening_table_values()->where('districts', $selectedCity)->value('districts');
$this->weather =  $addDailyForecast->evening_table_values()->where('districts', $selectedCity)->value('weather');
$this->winddir = $this->endsWith($this->wind);
$this->period = "Evening(6:00PM - 11:59PM)UTC";

$polugon = [];
  $polygonns=  $addDailyForecast->evening_polygons()->pluck('cordinate')->all();
$colors= $addDailyForecast->evening_polygons()->pluck('color')->all();
$polygonId = $addDailyForecast->evening_polygons()->pluck('polygonId')->all();
foreach ($polygonns as $index => $polygon) {
    $polugonn = [
      'polygonId' => $polygonId[$index],
      'polygon' =>  $polygon,
      'color' => $colors[$index],
]; 
$polugon[] = $polugonn;
}

$this->polygons =$polugon;

// get the markers
$markers = [];
$markerslat = $addDailyForecast->evening_markers()->pluck('lat')->all();
$markerslng = $addDailyForecast->evening_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->evening_markers()->pluck('icontype')->all();
$markerIds = $addDailyForecast->evening_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
    ];

    $markers[] = $marker;
}

$this->markers = $markers;

}else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    // get the latest Evening forecast from the evening_general_variables table
$latestEveningForecastId = Evening_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('add_daily_forecast_id');
    // now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestEveningForecastId);

//  now i can acess all the evening date from all the evening table in mysql
$this->latestGeneralData =  $addDailyForecast->evening_general_variables();


$this->currentConditionItd = $addDailyForecast->evening_general_variables()->value('itd');
$this->currentConditionRH =   $addDailyForecast->evening_table_values()->where('districts', $selectedCity)->value('humidity');
$this->currentConditionRain =   $addDailyForecast->evening_table_values()->where('districts', $selectedCity)->value('rain_chance');
$this->minTemp =   $addDailyForecast->evening_table_values()->where('districts', $selectedCity)->value('min_temp');
$this->maxTemp =   $addDailyForecast->evening_table_values()->where('districts', $selectedCity)->value('max_temp');
$this->wind =   $addDailyForecast->evening_table_values()->where('districts', $selectedCity)->value('wind');
$this->district =  $addDailyForecast->evening_table_values()->where('districts', $selectedCity)->value('districts');
$this->weather =  $addDailyForecast->evening_table_values()->where('districts', $selectedCity)->value('weather');
$this->winddir = $this->endsWith($this->wind);
$this->period = "Evening(6:00PM - 11:59PM)UTC";

$polugon = [];
  $polygonns=  $addDailyForecast->evening_polygons()->pluck('cordinate')->all();
$colors= $addDailyForecast->evening_polygons()->pluck('color')->all();
$polygonId = $addDailyForecast->evening_polygons()->pluck('polygonId')->all();
foreach ($polygonns as $index => $polygon) {
    $polugonn = [
      'polygonId' => $polygonId[$index],
      'polygon' =>  $polygon,
      'color' => $colors[$index],
]; 
$polugon[] = $polugonn;
}

$this->polygons =$polugon;

// get the markers
$markers = [];
$markerslat = $addDailyForecast->evening_markers()->pluck('lat')->all();
$markerslng = $addDailyForecast->evening_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->evening_markers()->pluck('icontype')->all();
$markerIds = $addDailyForecast->evening_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
    ];

    $markers[] = $marker;
}

$this->markers = $markers;

}
}

//24HRS  get the latest forecast from the morning_general_variables table
$latestForecastIdM = Morning_general_variables::whereDate('date', today())->latest('created_at')->value('add_daily_forecast_id');
// if today'smorningtable forecast is available
if( !is_null($latestForecastIdM)){
//24HRS now get the parent id from the addDailyForecast table
$addDailyForecastM = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestForecastIdM);
$minTempM =   $addDailyForecastM->morning_table_values()->where('districts', $selectedCity)->value('min_temp');
$maxTempM =   $addDailyForecastM->morning_table_values()->where('districts', $selectedCity)->value('max_temp');
$windM =   $addDailyForecastM->morning_table_values()->where('districts', $selectedCity)->value('wind');
$weatherM =  $addDailyForecastM->morning_table_values()->where('districts', $selectedCity)->value('weather');
$winddirM = $this->endsWith($windM);
}else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    //24HRS  get the latest forecast from the morning_general_variables table
$latestForecastIdM = Morning_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('add_daily_forecast_id');
//24HRS now get the parent id from the addDailyForecast table
$addDailyForecastM = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestForecastIdM);
$minTempM =   $addDailyForecastM->morning_table_values()->where('districts', $selectedCity)->value('min_temp');
$maxTempM =   $addDailyForecastM->morning_table_values()->where('districts', $selectedCity)->value('max_temp');
$windM =   $addDailyForecastM->morning_table_values()->where('districts', $selectedCity)->value('wind');
$weatherM =  $addDailyForecastM->morning_table_values()->where('districts', $selectedCity)->value('weather');
$winddirM = $this->endsWith($windM);

}


// =================================================afternoon=========================================
//24HRS  get the latest forecast from the morning_general_variables table
$latestForecastIdA = Afternoon_general_variables::whereDate('date', today())->latest('created_at')->value('add_daily_forecast_id');

// if today's afternoon table forecast is available
if( !is_null($latestForecastIdA)){
    //24HRS now get the parent id from the addDailyForecast table
$addDailyForecastA = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestForecastIdA);
$minTempA =   $addDailyForecastA->afternoon_table_values()->where('districts', $selectedCity)->value('min_temp');
$maxTempA =   $addDailyForecastA->afternoon_table_values()->where('districts', $selectedCity)->value('max_temp');
$windA =   $addDailyForecastA->afternoon_table_values()->where('districts', $selectedCity)->value('wind');
$weatherA =  $addDailyForecastA->afternoon_table_values()->where('districts', $selectedCity)->value('weather');
$winddirA = $this->endsWith($windA);
}
// else use yesterday's forecast
else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    $latestForecastIdA = Afternoon_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('add_daily_forecast_id');
    //24HRS now get the parent id from the addDailyForecast table
    $addDailyForecastA = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestForecastIdA);

    $minTempA =   $addDailyForecastA->afternoon_table_values()->where('districts', $selectedCity)->value('min_temp');
$maxTempA =   $addDailyForecastA->afternoon_table_values()->where('districts', $selectedCity)->value('max_temp');
$windA =   $addDailyForecastA->afternoon_table_values()->where('districts', $selectedCity)->value('wind');
$weatherA =  $addDailyForecastA->afternoon_table_values()->where('districts', $selectedCity)->value('weather');
$winddirA = $this->endsWith($windA);
}

// =================================================EVENING=========================================
//24HRS  get the latest forecast from the evening_general_variables table
$latestForecastIdE = Evening_general_variables::whereDate('date', today())->latest('created_at')->value('add_daily_forecast_id');
// if today's evening table forecast is available
if( !is_null($latestForecastIdE )){
//24HRS now get the parent id from the addDailyForecast table
$addDailyForecastE = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestForecastIdE);
$minTempE =   $addDailyForecastE->evening_table_values()->where('districts', $selectedCity)->value('min_temp');
$maxTempE =   $addDailyForecastE->evening_table_values()->where('districts', $selectedCity)->value('max_temp');
$windE =   $addDailyForecastE->evening_table_values()->where('districts', $selectedCity)->value('wind');
$weatherE =  $addDailyForecastE->evening_table_values()->where('districts', $selectedCity)->value('weather');
$winddirE = $this->endsWith($windE);
}else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    //24HRS  get the latest forecast from the evening_general_variables table
$latestForecastIdE = Evening_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('add_daily_forecast_id');
    //24HRS now get the parent id from the addDailyForecast table
$addDailyForecastE = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestForecastIdE);
$minTempE =   $addDailyForecastE->evening_table_values()->where('districts', $selectedCity)->value('min_temp');
$maxTempE =   $addDailyForecastE->evening_table_values()->where('districts', $selectedCity)->value('max_temp');
$windE =   $addDailyForecastE->evening_table_values()->where('districts', $selectedCity)->value('wind');
$weatherE =  $addDailyForecastE->evening_table_values()->where('districts', $selectedCity)->value('weather');
$winddirE = $this->endsWith($windE);
}
    return   view('welcome', ['districts' => $districts, 
    'time' => $this->time,
    'addDailyForecast' => $addDailyForecast,
    'currentConditionItd' =>$this->currentConditionItd,
    'currentConditionRH' => $this->currentConditionRH,
    'currentConditionRain' => $this->currentConditionRain,
    'minTemp' => $this->minTemp,
    'maxTemp' => $this->maxTemp,
    'wind' => strtoupper($this->wind), 
    'district' =>  $this->district,
    'weather' => $this->weather,
    'winddir' => $this->winddir,
    'period' => $this->period,
    'polygon' => $this->polygons,
    'markers' => $this->markers,
    'weatherM' => $weatherM,
    'minTempM' => $minTempM,
    'maxTempM' => $maxTempM,
    'windM' => $windM,
    'winddirM' => $winddirM,
    'weatherA' => $weatherA,
    'minTempA' => $minTempA,
    'maxTempA' => $maxTempA,
    'windA' => $windA,
    'winddirA' => $winddirA,
    'weatherE' => $weatherE,
    'minTempE' => $minTempE,
    'maxTempE' => $maxTempE,
    'windE' => $windE,
    'winddirE' => $winddirE
]);
}










}
