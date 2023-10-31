<?php

namespace App\Http\Controllers;
use App\Models\AddrainTempUpload;
use App\Models\AddDailyForecast;
use App\Models\AddFiveDayForecast;
use App\Models\Afternoon_general_variables;
use App\Models\Evening_general_variables;
use App\Models\Morning_general_variables;
use App\Models\MarineForecast;
use App\Models\Inland_Afternoon_general_variables;
use App\Models\Inland_Evening_general_variables;
use App\Models\Inland_Morning_general_variables;
use App\Models\InlandForecast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Seasonalforecast;
use Illuminate\Support\Facades\Log;
class Userhome extends Controller
{
     
    // public function __construct()
    // {
    //     $this->middleware('isAdmin');
    // }


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
    public $polygonsM = [];
    public $polygonsA = [];
    public $polygonsE = [];
    public $markers = [];
    public $markersM = [];
    public $markersA = [];
    public $markersE = [];
    public $time = [];
    public $eachDistrictWeather;
    public $fivedayforecast;
    public $spatialRainfallImage;
    public $spatialTempImage;
    public $marinedata;
    public $inlandlatestGeneralData;
    public $inlandeachDistrictWeather;
    public $inlandcurrentConditionminTemp;
    public $inlandcurrentConditionmaxTemp;
    public $inlandwind;
    public $inlanddistrict;
    public $inlandweather;
    public $inlandwinddir;
    public $inlandperiod;
    public $inlandpolygons;
    public $inlandmarkers;
    public $marinepolygons;
    public $marinemarkers;
    public $seasonalForecast;


public function timeOfDay()
    {
        $currentTime = Carbon::now('Africa/ACCRA')->format('H:i');
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
    $lastTwoChars = substr(strtoupper($string), -2);
    $regexPattern = '/(SW|WS|NW|WN|NE|SE|EN|ES|[SNWE])$/i';

    if (preg_match($regexPattern, $lastTwoChars, $matches)) {
        return $matches[0];
    }
return null;
}


 //cafo viewallMap page load
    public function viewallMap()
    {
// ====================morning map for viewall map==================
        // get the latest morning forecast from the morning_general_variables table
$latestMorningForecastId = Morning_general_variables::whereDate('date', today())->latest('created_at')->value('add_daily_forecast_id');
// dd($latestAfternoonForecastId);
if(!is_null($latestMorningForecastId)){
    // now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestMorningForecastId);
    // now get the map details 
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
  
  $this->polygonsM =$polugon;
  // get the markers
  $markers = [];
  $markerslat = $addDailyForecast->morning_markers()->pluck('lat')->all();
  $markerslng = $addDailyForecast->morning_markers()->pluck('lng')->all();
  $icontype = $addDailyForecast->morning_markers()->pluck('icontype')->all();
  $iconsize = $addDailyForecast->morning_markers()->pluck('iconsize')->all();
  $markerIds = $addDailyForecast->morning_markers()->pluck('markerId')->all();
  foreach ($markerIds as $index => $markerId) {
      $marker = [
          'markerId' => $markerId,
          'markerslnglat' => [
              'lng' => $markerslng[$index],
              'lat' => $markerslat[$index],
          ],
          'icontype' => $icontype[$index],
          'iconsize' => $iconsize[$index],
      ];
  
      $markers[] = $marker;
  }
  
  $this->markersM = $markers;
}else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    // get the latest morning forecast from the morning_general_variables table
$latestMorningForecastId = Morning_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('add_daily_forecast_id');
if(!is_null($latestMorningForecastId)){
    // now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestMorningForecastId);
  // now get the map details 
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

$this->polygonsM =$polugon;
// get the markers
$markers = [];
$markerslat = $addDailyForecast->morning_markers()->pluck('lat')->all();
$markerslng = $addDailyForecast->morning_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->morning_markers()->pluck('icontype')->all();
$iconsize = $addDailyForecast->morning_markers()->pluck('iconsize')->all();
$markerIds = $addDailyForecast->morning_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
        'iconsize' => $iconsize[$index]
    ];

    $markers[] = $marker;
}

$this->markersM = $markers;
}else{
    $this->markersM = 'null';
    $this->polygonsM = 'null';
    $addDailyForecast = 'null';
}

}

// 
// ====================AFTERNOON map for viewall map==================

// get the latest Afternoon forecast from the afternoon_general_variables table
$latestAfternoonForecastId = Afternoon_general_variables::whereDate('date', today())->latest('created_at')->value('add_daily_forecast_id');
// dd($latestAfternoonForecastId);
if(!is_null($latestAfternoonForecastId)){
// now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestAfternoonForecastId);

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

$this->polygonsA =$polugon;

// get the markers
$markers = [];
$markerslat = $addDailyForecast->afternoon_markers()->pluck('lat')->all();
$markerslng = $addDailyForecast->afternoon_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->afternoon_markers()->pluck('icontype')->all();
$iconsize = $addDailyForecast->afternoon_markers()->pluck('iconsize')->all();
$markerIds = $addDailyForecast->afternoon_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
        'iconsize' => $iconsize[$index],
    ];

    $markers[] = $marker;
}

$this->markersA = $markers;

}else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    $latestAfternoonForecastId = Afternoon_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('add_daily_forecast_id');
    if(!is_null($latestAfternoonForecastId)){
    // now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestAfternoonForecastId);

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

$this->polygonsA =$polugon;
// get the markers
$markers = [];
$markerslat = $addDailyForecast->afternoon_markers()->pluck('lat')->all();
$markerslng = $addDailyForecast->afternoon_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->afternoon_markers()->pluck('icontype')->all();
$iconsize = $addDailyForecast->afternoon_markers()->pluck('iconsize')->all();
$markerIds = $addDailyForecast->afternoon_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
        'iconsize' => $iconsize[$index],
    ];

    $markers[] = $marker;
}

$this->markersA = $markers;
    }else{
        $this->markersA = 'null';
        $this->polygonsA = 'null';
        $addDailyForecast = 'null';
    }
}

// ====================EVENING  map for viewall map==================

// get the latest Evening forecast from the evening_general_variables table
$latestEveningForecastId = Evening_general_variables::whereDate('date', today())->latest('created_at')->value('add_daily_forecast_id');
// dd($latestAfternoonForecastId);
if(!is_null($latestEveningForecastId)){
// now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestEveningForecastId);

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

$this->polygonsE =$polugon;

// get the markers
$markers = [];
$markerslat = $addDailyForecast->evening_markers()->pluck('lat')->all();
$markerslng = $addDailyForecast->evening_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->evening_markers()->pluck('icontype')->all();
$iconsize = $addDailyForecast->evening_markers()->pluck('iconsize')->all();
$markerIds = $addDailyForecast->evening_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
        'iconsize' => $iconsize[$index],
    ];

    $markers[] = $marker;
}

$this->markersE = $markers;

}else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    // get the yesterday Evening forecast from the evening_general_variables table
$latestEveningForecastId = Evening_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('add_daily_forecast_id');
if(!is_null($latestEveningForecastId)){
    // now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestEveningForecastId);

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

$this->polygonsE =$polugon;
 
// get the markers
$markers = [];
$markerslat = $addDailyForecast->evening_markers()->pluck('lat')->all();
$markerslng = $addDailyForecast->evening_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->evening_markers()->pluck('icontype')->all();
$iconsize = $addDailyForecast->evening_markers()->pluck('iconsize')->all();
$markerIds = $addDailyForecast->evening_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
        'iconsize' => $iconsize[$index],
    ];

    $markers[] = $marker;
}

$this->markersE = $markers;
}else{
    
    $this->polygonsE  =  'null';
    $this->markersE  = 'null';
    $addDailyForecast = 'null';
}}

        return view('viewallMap',
        ['polygonM' => $this->polygonsM,
        'polygonA' => $this->polygonsA,
        'polygonE' => $this->polygonsE,
        'markersM' => $this->markersM,
        'markersA' => $this->markersA,
        'markersE' => $this->markersE,
        'addDailyForecast' => $addDailyForecast,
            ]);

    }



 //=====================================inland  viewallMap page load=============================
    public function inlandviewallMap()
    {
// ====================morning map for viewall map==================
        // get the latest morning forecast from the inlandmorning_general_variables table
$latestMorningForecastId = Inland_Morning_general_variables::whereDate('date', today())->latest('created_at')->value('inland_forecast_id');
// dd($latestAfternoonForecastId);
if(!is_null($latestMorningForecastId)){
    // now get the parent id from the addDailyForecast table
$addDailyForecast = InlandForecast::where('publishType', 'Publish-Forecast')->find($latestMorningForecastId);
    // now get the map details 
    $polugon = [];
    $polygonns=  $addDailyForecast->inlandmorning_polygons()->pluck('cordinate')->all();
  $colors= $addDailyForecast->inlandmorning_polygons()->pluck('color')->all();
  $polygonId = $addDailyForecast->inlandmorning_polygons()->pluck('polygonId')->all();
  foreach ($polygonns as $index => $polygon) {
      $polugonn = [
        'polygonId' => $polygonId[$index],
        'polygon' =>  $polygon,
        'color' => $colors[$index],
  ]; 
  $polugon[] = $polugonn;
  }
  
  $this->polygonsM =$polugon;
  // get the markers
  $markers = [];
  $markerslat = $addDailyForecast->inlandmorning_markers()->pluck('lat')->all();
  $markerslng = $addDailyForecast->inlandmorning_markers()->pluck('lng')->all();
  $icontype = $addDailyForecast->inlandmorning_markers()->pluck('icontype')->all();
  $markerIds = $addDailyForecast->inlandmorning_markers()->pluck('markerId')->all();
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
  
  $this->markersM = $markers;
}else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    // get the latest morning forecast from the morning_general_variables table
$latestMorningForecastId = Inland_Morning_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('inland_forecast_id');
if(!is_null($latestMorningForecastId)){
    // now get the parent id from the addDailyForecast table
$addDailyForecast = InlandForecast::where('publishType', 'Publish-Forecast')->find($latestMorningForecastId);
  // now get the map details 
  $polugon = [];
  $polygonns=  $addDailyForecast->inlandmorning_polygons()->pluck('cordinate')->all();
$colors= $addDailyForecast->inlandmorning_polygons()->pluck('color')->all();
$polygonId = $addDailyForecast->inlandmorning_polygons()->pluck('polygonId')->all();
foreach ($polygonns as $index => $polygon) {
    $polugonn = [
      'polygonId' => $polygonId[$index],
      'polygon' =>  $polygon,
      'color' => $colors[$index],
]; 
$polugon[] = $polugonn;
}

$this->polygonsM =$polugon;
// get the markers
$markers = [];
$markerslat = $addDailyForecast->inlandmorning_markers()->pluck('lat')->all();
$markerslng = $addDailyForecast->inlandmorning_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->inlandmorning_markers()->pluck('icontype')->all();
$markerIds = $addDailyForecast->inlandmorning_markers()->pluck('markerId')->all();
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

$this->markersM = $markers;
}else{
    $this->markersM = 'null';
    $this->polygonsM = 'null';
    $addDailyForecast = 'null';
}

}

// 
// ====================AFTERNOON map for viewall map==================

// get the latest Afternoon forecast from the afternoon_general_variables table
$latestAfternoonForecastId = Inland_Afternoon_general_variables::whereDate('date', today())->latest('created_at')->value('inland_forecast_id');
// dd($latestAfternoonForecastId);
if(!is_null($latestAfternoonForecastId)){
// now get the parent id from the addDailyForecast table
$addDailyForecast = InlandForecast::where('publishType', 'Publish-Forecast')->find($latestAfternoonForecastId);

$polugon = [];
  $polygonns=  $addDailyForecast->inlandafternoon_polygons()->pluck('cordinate')->all();
$colors= $addDailyForecast->inlandafternoon_polygons()->pluck('color')->all();
$polygonId = $addDailyForecast->inlandafternoon_polygons()->pluck('polygonId')->all();
foreach ($polygonns as $index => $polygon) {
    $polugonn = [
      'polygonId' => $polygonId[$index],
      'polygon' =>  $polygon,
      'color' => $colors[$index],
]; 
$polugon[] = $polugonn;
}

$this->polygonsA =$polugon;

// get the markers
$markers = [];
$markerslat = $addDailyForecast->inlandafternoon_markers()->pluck('lat')->all();
$markerslng = $addDailyForecast->inlandafternoon_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->inlandafternoon_markers()->pluck('icontype')->all();
$markerIds = $addDailyForecast->inlandafternoon_markers()->pluck('markerId')->all();
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

$this->markersA = $markers;

}else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    $latestAfternoonForecastId = Inland_Afternoon_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('inland_forecast_id');
    if(!is_null($latestAfternoonForecastId)){
    // now get the parent id from the addDailyForecast table
$addDailyForecast = InlandForecast::where('publishType', 'Publish-Forecast')->find($latestAfternoonForecastId);

$polugon = [];
$polygonns=  $addDailyForecast->inlandafternoon_polygons()->pluck('cordinate')->all();
$colors= $addDailyForecast->inlandafternoon_polygons()->pluck('color')->all();
$polygonId = $addDailyForecast->inlandafternoon_polygons()->pluck('polygonId')->all();
foreach ($polygonns as $index => $polygon) {
  $polugonn = [
    'polygonId' => $polygonId[$index],
    'polygon' =>  $polygon,
    'color' => $colors[$index],
]; 
$polugon[] = $polugonn;
}

$this->polygonsA =$polugon;
// get the markers
$markers = [];
$markerslat = $addDailyForecast->inlandafternoon_markers()->pluck('lat')->all();
$markerslng = $addDailyForecast->inlandafternoon_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->inlandafternoon_markers()->pluck('icontype')->all();
$markerIds = $addDailyForecast->inlandafternoon_markers()->pluck('markerId')->all();
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

$this->markersA = $markers;
    }else{
        $this->markersA = 'null';
        $this->polygonsA = 'null';
        $addDailyForecast = 'null';
    }
}

// ====================EVENING  map for viewall map==================

// get the latest Evening forecast from the evening_general_variables table
$latestEveningForecastId = Inland_Evening_general_variables::whereDate('date', today())->latest('created_at')->value('inland_forecast_id');
// dd($latestAfternoonForecastId);
if(!is_null($latestEveningForecastId)){
// now get the parent id from the addDailyForecast table
$addDailyForecast = InlandForecast::where('publishType', 'Publish-Forecast')->find($latestEveningForecastId);

$polugon = [];
  $polygonns=  $addDailyForecast->inlandevening_polygons()->pluck('cordinate')->all();
$colors= $addDailyForecast->inlandevening_polygons()->pluck('color')->all();
$polygonId = $addDailyForecast->inlandevening_polygons()->pluck('polygonId')->all();
foreach ($polygonns as $index => $polygon) {
    $polugonn = [
      'polygonId' => $polygonId[$index],
      'polygon' =>  $polygon,
      'color' => $colors[$index],
]; 
$polugon[] = $polugonn;
}

$this->polygonsE =$polugon;

// get the markers
$markers = [];
$markerslat = $addDailyForecast->inlandevening_markers()->pluck('lat')->all();
$markerslng = $addDailyForecast->inlandevening_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->inlandevening_markers()->pluck('icontype')->all();
$markerIds = $addDailyForecast->inlandevening_markers()->pluck('markerId')->all();
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

$this->markersE = $markers;

}else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    // get the yesterday Evening forecast from the evening_general_variables table
$latestEveningForecastId = Inland_Evening_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('inland_forecast_id');
if(!is_null($latestEveningForecastId)){
    // now get the parent id from the addDailyForecast table
$addDailyForecast = InlandForecast::where('publishType', 'Publish-Forecast')->find($latestEveningForecastId);

$polugon = [];
$polygonns=  $addDailyForecast->inlandevening_polygons()->pluck('cordinate')->all();
$colors= $addDailyForecast->inlandevening_polygons()->pluck('color')->all();
$polygonId = $addDailyForecast->inlandevening_polygons()->pluck('polygonId')->all();
foreach ($polygonns as $index => $polygon) {
  $polugonn = [
    'polygonId' => $polygonId[$index],
    'polygon' =>  $polygon,
    'color' => $colors[$index],
]; 
$polugon[] = $polugonn;
}

$this->polygonsE =$polugon;
 
// get the markers
$markers = [];
$markerslat = $addDailyForecast->inlandevening_markers()->pluck('lat')->all();
$markerslng = $addDailyForecast->inlandevening_markers()->pluck('lng')->all();
$icontype = $addDailyForecast->inlandevening_markers()->pluck('icontype')->all();
$markerIds = $addDailyForecast->inlandevening_markers()->pluck('markerId')->all();
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

$this->markersE = $markers;
}else{
    
    $this->polygonsE  =  'null';
    $this->markersE  = 'null';
    $addDailyForecast = 'null';
}}

        return view('viewallMap',
        ['polygonM' => $this->polygonsM,
        'polygonA' => $this->polygonsA,
        'polygonE' => $this->polygonsE,
        'markersM' => $this->markersM,
        'markersA' => $this->markersA,
        'markersE' => $this->markersE,
        'addDailyForecast' => $addDailyForecast,
            ]);

    }
















    //on page load
    public function index()
    {
        // get seasonal forecast:
            // GET THE SPATIAL TEMPERATURE IMAGE URL
$this->seasonalForecast = Seasonalforecast::orderBy('created_at', 'desc')->get();

// get marine data from the Marineforecast database table:
$marineForecast = MarineForecast::latest()->where('publishType','PUBLISHED')->first();

if (isset($marineForecast)) {
  
    $marinepolugon = [];
    $marinepolygonns=  $marineForecast->marine_polygons()->pluck('cordinate')->all();
  $inlandcolors= $marineForecast->marine_polygons()->pluck('color')->all();
  $marinepolygonId = $marineForecast->marine_polygons()->pluck('polygonId')->all();
}else{

    $marinepolygonId = [];

}




  if(!empty($marinepolygonId)){
  foreach ($marinepolygonns as $index => $marinepolygon) {
      $marinepolugonn = [
        'polygonId' => $marinepolygonId[$index],
        'polygon' =>  $marinepolygon,
        'color' => $inlandcolors[$index],
  ]; 
  $marinepolugon[] = $marinepolugonn;
  }
  
  $this->marinepolygons = $marinepolugon;
  }else{
    $this->marinepolygons = "null";
  }

  // get the marinemarkers
  $marinemarkers = [];

  if ( isset($marineForecast) ) {
    
  $marinemarkerslat = $marineForecast->marine_markers()->pluck('lat')->all();
  $marinemarkerslng = $marineForecast->marine_markers()->pluck('lng')->all();
  $marinecontype = $marineForecast->marine_markers()->pluck('icontype')->all();
  $marinemarkerIds = $marineForecast->marine_markers()->pluck('markersId')->all();

  if(!empty($marinemarkerIds)){
    foreach ($marinemarkerIds as $index => $marinemarkerId) {
        $marinemarker = [
            'markerId' => $marinemarkerId,
            'markerslnglat' => [
                'lng' => $marinemarkerslng[$index],
                'lat' => $marinemarkerslat[$index],
            ],
            'icontype' => $marinecontype[$index],
        ];
    
        $marinemarkers[] = $marinemarker;
    }
    
    $this->marinemarkers = $marinemarkers;
    
  }else{
    $this->marinemarkers = "null";
  }

$this->marinedata = $marineForecast;
 
}else{
    $this->marinemarkers = [];
    $this->marinedata = [];
    
  }


// GET THE SPATIAL RAINFALL  IMAGE URL
$this->spatialRainfallImage = AddrainTempUpload::where('imageType', 'rain')
->latest('created_at')
->limit(5)
->get();

// dd($this->spatialRainfallImage);
// exit();
// GET THE SPATIAL TEMPERATURE IMAGE URL
$this->spatialTempImage = AddrainTempUpload::where('imageType', 'temp')
->latest('created_at')
->limit(5)
->get();


        $whatthisIsIt = $this->timeOfDay();

        $districts = DB::table('cafodistricts')->orderBy('districtname')->get();
        $startDate = Carbon::today();
$endDate = Carbon::today()->addDays(5);

$dates = [];
$existingDates = [];

while ($startDate <= $endDate) {
    $date = $startDate->toDateString();

    if (!in_array($date, $existingDates)) {
        $dates[] = $date;
        $existingDates[] = $date;
    }

    $startDate->addDay();
}

// Retrieve records from the database
$tfivedayforecast =  AddFiveDayForecast::whereIn('date', $dates)->where('district', 'ACCRA')->where('status', 'Approved')->latest('created_at')
->take(5)->get();


// Assuming you have retrieved the records and stored them in $this->fivedayforecast
$this->fivedayforecast = $tfivedayforecast->sortBy(function ($forecast) {
    return Carbon::parse($forecast->date)->diffInDays(Carbon::today());
});

        // $this->fivedayforecast = AddFiveDayForecast::whereDate('date', today())->latest('created_at')->value('add_daily_forecast_id');

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
$this->eachDistrictWeather = $addDailyForecast->morning_table_values()->where('districts', '!=', 'ACCRA')->get();


    $this->currentConditionItd = $addDailyForecast->morning_general_variables()->value('itd');
    $this->currentConditionRH =   $addDailyForecast->morning_table_values()->where('districts', 'ACCRA')->value('humidity');
  $this->currentConditionRain =   $addDailyForecast->morning_table_values()->where('districts', 'ACCRA')->value('rain_chance');
  $this->minTemp =   $addDailyForecast->morning_table_values()->where('districts', 'ACCRA')->value('min_temp');
  $this->maxTemp =   $addDailyForecast->morning_table_values()->where('districts', 'ACCRA')->value('max_temp');
  $this->wind =   $addDailyForecast->morning_table_values()->where('districts', 'ACCRA')->value('wind');
  $this->district =  $addDailyForecast->morning_table_values()->where('districts', 'ACCRA')->value('districts');
 $this->weather =  $addDailyForecast->morning_table_values()->where('districts', 'ACCRA')->value('weather');
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
$iconsize = $addDailyForecast->morning_markers()->pluck('iconsize')->all();
$markerIds = $addDailyForecast->morning_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
        'iconsize' => $iconsize[$index],
    ];

    $markers[] = $marker;
}

$this->markers = $markers;

}else{
    
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    // get the latest morning forecast from the morning_general_variables table
$latestMorningForecastId = Morning_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('add_daily_forecast_id');

if(!is_null($latestMorningForecastId)){
    // now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestMorningForecastId);

//  now i can acess all the morning date from all the morning table in mysql
$this->latestGeneralData =  $addDailyForecast->morning_general_variables();
$this->eachDistrictWeather = $addDailyForecast->morning_table_values()->where('districts', '!=', 'ACCRA')->get();


    $this->currentConditionItd = $addDailyForecast->morning_general_variables()->value('itd');
    $this->currentConditionRH =   $addDailyForecast->morning_table_values()->where('districts', 'ACCRA')->value('humidity');
  $this->currentConditionRain =   $addDailyForecast->morning_table_values()->where('districts', 'ACCRA')->value('rain_chance');
  $this->minTemp =   $addDailyForecast->morning_table_values()->where('districts', 'ACCRA')->value('min_temp');
  $this->maxTemp =   $addDailyForecast->morning_table_values()->where('districts', 'ACCRA')->value('max_temp');
  $this->wind =   $addDailyForecast->morning_table_values()->where('districts', 'ACCRA')->value('wind');
  $this->district =  $addDailyForecast->morning_table_values()->where('districts', 'ACCRA')->value('districts');
 $this->weather =  $addDailyForecast->morning_table_values()->where('districts', 'ACCRA')->value('weather');
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
$iconsize = $addDailyForecast->morning_markers()->pluck('iconsize')->all();
$markerIds = $addDailyForecast->morning_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
        'iconsize' => $iconsize[$index],
    ];

    $markers[] = $marker;
}

$this->markers = $markers;

}else{
    
    $addDailyForecast = 'null';
    $this->markers = 'null';
    $this->polygons = 'null'; 
    $this->latestGeneralData = 'null';
    $this->period = 'null';
    $this->weather = 'null';
    $this->winddir = 'null';
    $this->weather = 'null';
    $this->minTemp = 'null';
$this->maxTemp =  'null';
  $this->wind = 'null';
$this->district='null';
$this->currentConditionItd = 'null';
$this->currentConditionRH ='null';
$this->currentConditionRain = 'null';
$this->latestGeneralData = 'null';
$this->eachDistrictWeather = 'null';
}
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
$this->eachDistrictWeather = $addDailyForecast->afternoon_table_values()->where('districts', '!=', 'ACCRA')->get();


    $this->currentConditionItd = $addDailyForecast->afternoon_general_variables()->value('itd');
    $this->currentConditionRH =   $addDailyForecast->afternoon_table_values()->where('districts', 'ACCRA')->value('humidity');
  $this->currentConditionRain =   $addDailyForecast->afternoon_table_values()->where('districts', 'ACCRA')->value('rain_chance');
  $this->minTemp =   $addDailyForecast->afternoon_table_values()->where('districts', 'ACCRA')->value('min_temp');
  $this->maxTemp =   $addDailyForecast->afternoon_table_values()->where('districts', 'ACCRA')->value('max_temp');
  $this->wind =   $addDailyForecast->afternoon_table_values()->where('districts', 'ACCRA')->value('wind');
  $this->district =  $addDailyForecast->afternoon_table_values()->where('districts', 'ACCRA')->value('districts');
 $this->weather =  $addDailyForecast->afternoon_table_values()->where('districts', 'ACCRA')->value('weather');
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
$iconsize = $addDailyForecast->afternoon_markers()->pluck('iconsize')->all();
$markerIds = $addDailyForecast->afternoon_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
        'iconsize' => $iconsize[$index],
    ];

    $markers[] = $marker;
}

$this->markers = $markers;

}else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    $latestAfternoonForecastId = Afternoon_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('add_daily_forecast_id');
    if(!is_null($latestAfternoonForecastId)){
    // now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestAfternoonForecastId);

//  now i can acess all the afternoon date from all the afternoon table in mysql
$this->latestGeneralData =  $addDailyForecast->afternoon_general_variables();
$this->eachDistrictWeather = $addDailyForecast->afternoon_table_values()->where('districts', '!=', 'ACCRA')->get();


    $this->currentConditionItd = $addDailyForecast->afternoon_general_variables()->value('itd');
    $this->currentConditionRH =   $addDailyForecast->afternoon_table_values()->where('districts', 'ACCRA')->value('humidity');
  $this->currentConditionRain =   $addDailyForecast->afternoon_table_values()->where('districts', 'ACCRA')->value('rain_chance');
  $this->minTemp =   $addDailyForecast->afternoon_table_values()->where('districts', 'ACCRA')->value('min_temp');
  $this->maxTemp =   $addDailyForecast->afternoon_table_values()->where('districts', 'ACCRA')->value('max_temp');
  $this->wind =   $addDailyForecast->afternoon_table_values()->where('districts', 'ACCRA')->value('wind');
  $this->district =  $addDailyForecast->afternoon_table_values()->where('districts', 'ACCRA')->value('districts');
 $this->weather =  $addDailyForecast->afternoon_table_values()->where('districts', 'ACCRA')->value('weather');
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
$iconsize = $addDailyForecast->afternoon_markers()->pluck('iconsize')->all();
$markerIds = $addDailyForecast->afternoon_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
        'iconsize' => $iconsize[$index],
    ];

    $markers[] = $marker;
}

$this->markers = $markers;
    }else{
        $addDailyForecast = 'null';
    $this->markers = 'null';
        $this->polygons = 'null'; 
        $this->latestGeneralData = 'null';
        $this->period = 'null';
        $this->weather = 'null';
        $this->winddir = 'null';
        $this->weather = 'null';
        $this->minTemp = 'null';
        $this->maxTemp =  'null';
        $this->wind = 'null';
       $this->district='null';
       $this->currentConditionItd = 'null';
       $this->currentConditionRH ='null';
      $this->currentConditionRain = 'null';
     $this->latestGeneralData = 'null';
     $this->eachDistrictWeather = 'null';

    }
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
$this->eachDistrictWeather = $addDailyForecast->evening_table_values()->where('districts', '!=', 'ACCRA')->get();


    $this->currentConditionItd = $addDailyForecast->evening_general_variables()->value('itd');
    $this->currentConditionRH =   $addDailyForecast->evening_table_values()->where('districts', 'ACCRA')->value('humidity');
  $this->currentConditionRain =   $addDailyForecast->evening_table_values()->where('districts', 'ACCRA')->value('rain_chance');
  $this->minTemp =   $addDailyForecast->evening_table_values()->where('districts', 'ACCRA')->value('min_temp');
  $this->maxTemp =   $addDailyForecast->evening_table_values()->where('districts', 'ACCRA')->value('max_temp');
  $this->wind =   $addDailyForecast->evening_table_values()->where('districts', 'ACCRA')->value('wind');
  $this->district =  $addDailyForecast->evening_table_values()->where('districts', 'ACCRA')->value('districts');
 $this->weather =  $addDailyForecast->evening_table_values()->where('districts', 'ACCRA')->value('weather');
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
$iconsize = $addDailyForecast->evening_markers()->pluck('iconsize')->all();
$markerIds = $addDailyForecast->evening_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
        'iconsize' => $iconsize[$index],
    ];

    $markers[] = $marker;
}

$this->markers = $markers;


}else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    // get the yesterday Evening forecast from the evening_general_variables table
$latestEveningForecastId = Evening_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('add_daily_forecast_id');
if(!is_null($latestEveningForecastId)){
    // now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestEveningForecastId);

//  now i can acess all the evening date from all the evening table in mysql
$this->latestGeneralData =  $addDailyForecast->evening_general_variables();
$this->eachDistrictWeather = $addDailyForecast->evening_table_values()->where('districts', '!=', 'ACCRA')->get();


    $this->currentConditionItd = $addDailyForecast->evening_general_variables()->value('itd');
    $this->currentConditionRH =   $addDailyForecast->evening_table_values()->where('districts', 'ACCRA')->value('humidity');
  $this->currentConditionRain =   $addDailyForecast->evening_table_values()->where('districts', 'ACCRA')->value('rain_chance');
  $this->minTemp =   $addDailyForecast->evening_table_values()->where('districts', 'ACCRA')->value('min_temp');
  $this->maxTemp =   $addDailyForecast->evening_table_values()->where('districts', 'ACCRA')->value('max_temp');
  $this->wind =   $addDailyForecast->evening_table_values()->where('districts', 'ACCRA')->value('wind');
  $this->district =  $addDailyForecast->evening_table_values()->where('districts', 'ACCRA')->value('districts');
 $this->weather =  $addDailyForecast->evening_table_values()->where('districts', 'ACCRA')->value('weather');
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
$iconsize = $addDailyForecast->evening_markers()->pluck('iconsize')->all();
$markerIds = $addDailyForecast->evening_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
        'iconsize' => $iconsize[$index],
    ];

    $markers[] = $marker;
}

$this->markers = $markers;
 

}else{
    $addDailyForecast = 'null';
    $this->markers = 'null';
    $this->polygons = 'null'; 
    $this->latestGeneralData = 'null';
    $this->period = 'null';
    $this->weather = 'null';
    $this->winddir = 'null';
    $this->weather = 'null';
    $this->minTemp = 'null';
    $this->maxTemp =  'null';
    $this->wind = 'null';
   $this->district='null';
   $this->currentConditionItd = 'null';
   $this->currentConditionRH ='null';
  $this->currentConditionRain = 'null';
 $this->latestGeneralData = 'null';
 $this->eachDistrictWeather = 'null';
}
}
}

//24HRS  get the latest forecast from the morning_general_variables table
$latestForecastIdM = Morning_general_variables::whereDate('date', today())->latest('created_at')->value('add_daily_forecast_id');
if( !is_null($latestForecastIdM)){
//24HRS now get the parent id from the addDailyForecast table
$addDailyForecastM = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestForecastIdM);
$minTempM =   $addDailyForecastM->morning_table_values()->where('districts', 'ACCRA')->value('min_temp');
$maxTempM =   $addDailyForecastM->morning_table_values()->where('districts', 'ACCRA')->value('max_temp');
$windM =   $addDailyForecastM->morning_table_values()->where('districts', 'ACCRA')->value('wind');
$weatherM =  $addDailyForecastM->morning_table_values()->where('districts', 'ACCRA')->value('weather');
$winddirM = $this->endsWith($windM);
}else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    //24HRS  get the latest forecast from the morning_general_variables table
$latestForecastIdM = Morning_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('add_daily_forecast_id');
if(!is_null($latestForecastIdM)){
    //24HRS now get the parent id from the addDailyForecast table
$addDailyForecastM = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestForecastIdM);
$minTempM =   $addDailyForecastM->morning_table_values()->where('districts', 'ACCRA')->value('min_temp');
$maxTempM =   $addDailyForecastM->morning_table_values()->where('districts', 'ACCRA')->value('max_temp');
$windM =   $addDailyForecastM->morning_table_values()->where('districts', 'ACCRA')->value('wind');
$weatherM =  $addDailyForecastM->morning_table_values()->where('districts', 'ACCRA')->value('weather');
$winddirM = $this->endsWith($windM);
}else{
    $addDailyForecastM = 'null';
    $minTempM =  'null';
    $maxTempM =   'null';
    $windM =   'null';
    $weatherM = 'null';
    $winddirM = 'null';
}

}



// =================================================afternoon=========================================
//24HRS  get the latest forecast from the morning_general_variables table
$latestForecastIdA = Afternoon_general_variables::whereDate('date', today())->latest('created_at')->value('add_daily_forecast_id');
if( !is_null($latestForecastIdA)){
//24HRS now get the parent id from the addDailyForecast table
$addDailyForecastA = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestForecastIdA);
$minTempA =   $addDailyForecastA->afternoon_table_values()->where('districts', 'ACCRA')->value('min_temp');
$maxTempA =   $addDailyForecastA->afternoon_table_values()->where('districts', 'ACCRA')->value('max_temp');
$windA =   $addDailyForecastA->afternoon_table_values()->where('districts', 'ACCRA')->value('wind');
$weatherA =  $addDailyForecastA->afternoon_table_values()->where('districts', 'ACCRA')->value('weather');
$winddirA = $this->endsWith($windA);
}// else use yesterday's forecast
else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    if( !is_null($latestForecastIdA)){
    //24HRS  get the latest forecast from the morning_general_variables table
$latestForecastIdA = Afternoon_general_variables::whereDate('date',  $yesterday)->latest('created_at')->value('add_daily_forecast_id');
    //24HRS now get the parent id from the addDailyForecast table
$addDailyForecastA = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestForecastIdA);
$minTempA =   $addDailyForecastA->afternoon_table_values()->where('districts', 'ACCRA')->value('min_temp');
$maxTempA =   $addDailyForecastA->afternoon_table_values()->where('districts', 'ACCRA')->value('max_temp');
$windA =   $addDailyForecastA->afternoon_table_values()->where('districts', 'ACCRA')->value('wind');
$weatherA =  $addDailyForecastA->afternoon_table_values()->where('districts', 'ACCRA')->value('weather');
$winddirA = $this->endsWith($windA);
    }else{
        $addDailyForecastA = 'null';
    $windA =   'null'; 
    $weatherA = 'null';
    $winddirA ='null';
    $minTempA =  'null';
    $maxTempA =  'null';
    }

}
// =================================================EVENING=========================================
//24HRS  get the latest forecast from the evening_general_variables table
$latestForecastIdE = Evening_general_variables::whereDate('date', today())->latest('created_at')->value('add_daily_forecast_id');
// if today's evening table forecast is available
if( !is_null($latestForecastIdE)){
//24HRS now get the parent id from the addDailyForecast table
$addDailyForecastE = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestForecastIdE);
$minTempE =   $addDailyForecastE->evening_table_values()->where('districts', 'ACCRA')->value('min_temp');
$maxTempE =   $addDailyForecastE->evening_table_values()->where('districts', 'ACCRA')->value('max_temp');
$windE =   $addDailyForecastE->evening_table_values()->where('districts', 'ACCRA')->value('wind');
$weatherE =  $addDailyForecastE->evening_table_values()->where('districts', 'ACCRA')->value('weather');
$winddirE = $this->endsWith($windE);
}else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
//24HRS  get the latest forecast from the evening_general_variables table
$latestForecastIdE = Evening_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('add_daily_forecast_id');
if( !is_null($latestForecastIdE)){
    //24HRS now get the parent id from the addDailyForecast table
$addDailyForecastE = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestForecastIdE);
$minTempE =   $addDailyForecastE->evening_table_values()->where('districts', 'ACCRA')->value('min_temp');
$maxTempE =   $addDailyForecastE->evening_table_values()->where('districts', 'ACCRA')->value('max_temp');
$windE =   $addDailyForecastE->evening_table_values()->where('districts', 'ACCRA')->value('wind');
$weatherE =  $addDailyForecastE->evening_table_values()->where('districts', 'ACCRA')->value('weather');
$winddirE = $this->endsWith($windE);
}else{
    $addDailyForecastE = 'null';
$minTempE =   'null';
$maxTempE =  'null';
$windE =   'null';
$weatherE =  'null';
$winddirE = 'null';
}
}


// =======================================INLAND FORECAST =================================


        $inlandwhatthisIsIt = $this->timeOfDay();

        $inlanddistricts = DB::table('marine_districts')->orderBy('districtname')->get();
  
        // NOW GET THE CONDITIONS BY TIME OF THE DAY
if($inlandwhatthisIsIt == 'Morning'){
// get the latest morning forecast from the inland_morning_general_variables table
$inlandlatestMorningForecastId = Inland_Morning_general_variables::whereDate('date', today())->latest('created_at')->value('inland_forecast_id');
// dd($latestAfternoonForecastId);
if(!is_null($inlandlatestMorningForecastId)){
// now get the parent id from the inlandForecast table
$addInlandForecast = InlandForecast::where('publishType', 'Publish-Forecast')->find($inlandlatestMorningForecastId);

//  now i can acess all the morning date from all the morning table in mysql
$this->inlandlatestGeneralData =  $addInlandForecast->inlandmorning_general_variables();
$this->inlandeachDistrictWeather = $addInlandForecast->inlandmorning_table_values()->where('districts', '!=', 'ADA')->get();


    $this->inlandcurrentConditionminTemp = $addInlandForecast->inlandmorning_general_variables()->value('min_temp');
    $this->inlandcurrentConditionmaxTemp = $addInlandForecast->inlandmorning_general_variables()->value('max_temp');
    
  $this->inlandwind =   $addInlandForecast->inlandmorning_table_values()->where('districts', 'ADA')->value('wind');
  $this->inlanddistrict =  $addInlandForecast->inlandmorning_table_values()->where('districts', 'ADA')->value('districts');
 $this->inlandweather =  $addInlandForecast->inlandmorning_table_values()->where('districts', 'ADA')->value('weather');
$this->inlandwinddir = $this->endsWith($this->inlandwind);
  $this->inlandperiod = "Morning(12:00AM - 5:59AM)UTC";
  $inlandpolugon = [];
  $inlandpolygonns=  $addInlandForecast->inlandmorning_polygons()->pluck('cordinate')->all();
$inlandcolors= $addInlandForecast->inlandmorning_polygons()->pluck('color')->all();
$inlandpolygonId = $addInlandForecast->inlandmorning_polygons()->pluck('polygonId')->all();
foreach ($inlandpolygonns as $index => $inlandpolygon) {
    $inlandpolugonn = [
      'polygonId' => $inlandpolygonId[$index],
      'polygon' =>  $inlandpolygon,
      'color' => $inlandcolors[$index],
]; 
$inlandpolugon[] = $inlandpolugonn;
}

$this->inlandpolygons =$inlandpolugon;
// get the inlandmarkers
$inlandmarkers = [];
$inlandmarkerslat = $addInlandForecast->inlandmorning_markers()->pluck('lat')->all();
$inlandmarkerslng = $addInlandForecast->inlandmorning_markers()->pluck('lng')->all();
$inlandcontype = $addInlandForecast->inlandmorning_markers()->pluck('icontype')->all();
$inlandmarkerIds = $addInlandForecast->inlandmorning_markers()->pluck('markerId')->all();
foreach ($inlandmarkerIds as $index => $inlandmarkerId) {
    $inlandmarker = [
        'markerId' => $inlandmarkerId,
        'markerslnglat' => [
            'lng' => $inlandmarkerslng[$index],
            'lat' => $inlandmarkerslat[$index],
        ],
        'icontype' => $inlandcontype[$index],
    ];

    $inlandmarkers[] = $inlandmarker;
}

$this->inlandmarkers = $inlandmarkers;

}else{
    $inlandyesterday = Carbon::now()->subDay()->format('Y-m-d');
    // get the latest morning forecast from the inlandmorning_general_variables table
$inlandlatestMorningForecastId = Inland_Morning_general_variables::whereDate('date', $inlandyesterday)->latest('created_at')->value('inland_forecast_id');

if(!is_null($inlandlatestMorningForecastId)){
    // now get the parent id from the addInlandForecast table
$addInlandForecast = InlandForecast::where('publishType', 'Publish-Forecast')->find($inlandlatestMorningForecastId);

//  now i can acess all the morning date from all the morning table in mysql
$this->inlandlatestGeneralData =  $addInlandForecast->inlandmorning_general_variables();
$this->inlandeachDistrictWeather = $addInlandForecast->inlandmorning_table_values()->where('districts', '!=', 'ADA')->get();


    $this->inlandcurrentConditionminTemp = $addInlandForecast->inlandmorning_general_variables()->value('min_temp');
    $this->inlandcurrentConditionmaxTemp = $addInlandForecast->inlandmorning_general_variables()->value('max_temp');
    
  $this->inlandwind =   $addInlandForecast->inlandmorning_table_values()->where('districts', 'ADA')->value('wind');
  $this->inlanddistrict =  $addInlandForecast->inlandmorning_table_values()->where('districts', 'ADA')->value('districts');
 $this->inlandweather =  $addInlandForecast->inlandmorning_table_values()->where('districts', 'ADA')->value('weather');
$this->inlandwinddir = $this->endsWith($this->inlandwind);
  $this->inlandperiod = "Morning(12:00AM - 5:59AM)UTC";
  $inlandpolugon = [];
  $inlandpolygonns=  $addInlandForecast->inlandmorning_polygons()->pluck('cordinate')->all();
$inlandcolors= $addInlandForecast->inlandmorning_polygons()->pluck('color')->all();
$inlandpolygonId = $addInlandForecast->inlandmorning_polygons()->pluck('polygonId')->all();
foreach ($inlandpolygonns as $index => $inlandpolygon) {
    $inlandpolugonn = [
      'polygonId' => $inlandpolygonId[$index],
      'polygon' =>  $inlandpolygon,
      'color' => $inlandcolors[$index],
]; 
$inlandpolugon[] = $inlandpolugonn;
}

$this->inlandpolygons =$inlandpolugon;
// get the inlandmarkers
$inlandmarkers = [];
$inlandmarkerslat = $addInlandForecast->inlandmorning_markers()->pluck('lat')->all();
$inlandmarkerslng = $addInlandForecast->inlandmorning_markers()->pluck('lng')->all();
$inlandcontype = $addInlandForecast->inlandmorning_markers()->pluck('icontype')->all();
$inlandmarkerIds = $addInlandForecast->inlandmorning_markers()->pluck('markerId')->all();
foreach ($inlandmarkerIds as $index => $inlandmarkerId) {
    $inlandmarker = [
        'markerId' => $inlandmarkerId,
        'markerslnglat' => [
            'lng' => $inlandmarkerslng[$index],
            'lat' => $inlandmarkerslat[$index],
        ],
        'icontype' => $inlandcontype[$index],
    ];

    $inlandmarkers[] = $inlandmarker;
}

$this->inlandmarkers = $inlandmarkers;

}else{
    
    $addInlandForecast = 'null';
    $this->inlandmarkers = 'null';
    $this->inlandpolygons = 'null'; 
    $this->inlandlatestGeneralData = 'null';
    $this->inlandperiod = 'null';
    $this->inlandweather = 'null';
    $this->inlandwinddir = 'null'; 
  $this->inlandwind = 'null';
$this->inlanddistrict='null';
$this->inlandcurrentConditionminTemp ='null';
$this->inlandcurrentConditionmaxTemp = 'null';
$this->inlandeachDistrictWeather = 'null';
}
}
}else if($inlandwhatthisIsIt == 'Afternoon'){
// get the latest Afternoon forecast from the inlandafternoon_general_variables table
$latestAfternoonForecastId = Inland_Afternoon_general_variables::whereDate('date', today())->latest('created_at')->value('inland_forecast_id');
// dd($latestAfternoonForecastId);
if(!is_null($latestAfternoonForecastId)){
// now get the parent id from the addInlandForecast table
$addInlandForecast = InlandForecast::where('publishType', 'Publish-Forecast')->find($latestAfternoonForecastId);

//  now i can acess all the afternoon date from all the afternoon table in mysql
$this->inlandlatestGeneralData =  $addInlandForecast->inlandafternoon_general_variables();
$this->inlandeachDistrictWeather = $addInlandForecast->inlandafternoon_table_values()->where('districts', '!=', 'ADA')->get();


$this->inlandcurrentConditionminTemp = $addInlandForecast->inlandmorning_general_variables()->value('min_temp');
$this->inlandcurrentConditionmaxTemp = $addInlandForecast->inlandmorning_general_variables()->value('max_temp');
  $this->inlandwind =   $addInlandForecast->inlandafternoon_table_values()->where('districts', 'ADA')->value('wind');
  $this->inlanddistrict =  $addInlandForecast->inlandafternoon_table_values()->where('districts', 'ADA')->value('districts');
 $this->inlandweather =  $addInlandForecast->inlandafternoon_table_values()->where('districts', 'ADA')->value('weather');
$this->inlandwinddir = $this->endsWith($this->inlandwind);
  $this->inlandperiod = "Afternoon(12:00PM - 5:59PM)UTC";

$inlandpolugon = [];
  $inlandpolygonns=  $addInlandForecast->inlandafternoon_polygons()->pluck('cordinate')->all();
$inlandcolors= $addInlandForecast->inlandafternoon_polygons()->pluck('color')->all();
$inlandpolygonId = $addInlandForecast->inlandafternoon_polygons()->pluck('polygonId')->all();
foreach ($inlandpolygonns as $index => $inlandpolygon) {
    $inlandpolugonn = [
      'polygonId' => $inlandpolygonId[$index],
      'polygon' =>  $inlandpolygon,
      'color' => $inlandcolors[$index],
]; 
$inlandpolugon[] = $inlandpolugonn;
}

$this->inlandpolygons =$inlandpolugon;

// get the inlandmarkers
$inlandmarkers = [];
$inlandmarkerslat = $addInlandForecast->inlandafternoon_markers()->pluck('lat')->all();
$inlandmarkerslng = $addInlandForecast->inlandafternoon_markers()->pluck('lng')->all();
$inlandcontype = $addInlandForecast->inlandafternoon_markers()->pluck('icontype')->all();
$inlandmarkerIds = $addInlandForecast->inlandafternoon_markers()->pluck('markerId')->all();
foreach ($inlandmarkerIds as $index => $inlandmarkerId) {
    $inlandmarker = [
        'markerId' => $inlandmarkerId,
        'markerslnglat' => [
            'lng' => $inlandmarkerslng[$index],
            'lat' => $inlandmarkerslat[$index],
        ],
        'icontype' => $inlandcontype[$index],
    ];

    $inlandmarkers[] = $inlandmarker;
}

$this->inlandmarkers = $inlandmarkers;

}else{
    $inlandyesterday = Carbon::now()->subDay()->format('Y-m-d');
    $latestAfternoonForecastId = Inland_Afternoon_general_variables::whereDate('date', $inlandyesterday)->latest('created_at')->value('inland_forecast_id');
    if(!is_null($latestAfternoonForecastId)){
    // now get the parent id from the addInlandForecast table
$addInlandForecast = InlandForecast::where('publishType', 'Publish-Forecast')->find($latestAfternoonForecastId);

//  now i can acess all the afternoon date from all the afternoon table in mysql
$this->inlandlatestGeneralData =  $addInlandForecast->inlandafternoon_general_variables();
$this->inlandeachDistrictWeather = $addInlandForecast->inlandafternoon_table_values()->where('districts', '!=', 'ADA')->get();


$this->inlandcurrentConditionminTemp = $addInlandForecast->inlandmorning_general_variables()->value('min_temp');
$this->inlandcurrentConditionmaxTemp = $addInlandForecast->inlandmorning_general_variables()->value('max_temp');
 
  $this->inlandwind =   $addInlandForecast->inlandafternoon_table_values()->where('districts', 'ADA')->value('wind');
  $this->inlanddistrict =  $addInlandForecast->inlandafternoon_table_values()->where('districts', 'ADA')->value('districts');
 $this->inlandweather =  $addInlandForecast->inlandafternoon_table_values()->where('districts', 'ADA')->value('weather');
$this->inlandwinddir = $this->endsWith($this->inlandwind);
  $this->inlandperiod = "Afternoon(12:00PM - 5:59PM)UTC";
  
$inlandpolugon = [];
$inlandpolygonns=  $addInlandForecast->inlandafternoon_polygons()->pluck('cordinate')->all();
$inlandcolors= $addInlandForecast->inlandafternoon_polygons()->pluck('color')->all();
$inlandpolygonId = $addInlandForecast->inlandafternoon_polygons()->pluck('polygonId')->all();
foreach ($inlandpolygonns as $index => $inlandpolygon) {
  $inlandpolugonn = [
    'polygonId' => $inlandpolygonId[$index],
    'polygon' =>  $inlandpolygon,
    'color' => $inlandcolors[$index],
]; 
$inlandpolugon[] = $inlandpolugonn;
}

$this->inlandpolygons =$inlandpolugon;
// get the inlandmarkers
$inlandmarkers = [];
$inlandmarkerslat = $addInlandForecast->inlandafternoon_markers()->pluck('lat')->all();
$inlandmarkerslng = $addInlandForecast->inlandafternoon_markers()->pluck('lng')->all();
$inlandcontype = $addInlandForecast->inlandafternoon_markers()->pluck('icontype')->all();
$inlandmarkerIds = $addInlandForecast->inlandafternoon_markers()->pluck('markerId')->all();
foreach ($inlandmarkerIds as $index => $inlandmarkerId) {
    $inlandmarker = [
        'markerId' => $inlandmarkerId,
        'markerslnglat' => [
            'lng' => $inlandmarkerslng[$index],
            'lat' => $inlandmarkerslat[$index],
        ],
        'icontype' => $inlandcontype[$index],
    ];

    $inlandmarkers[] = $inlandmarker;
}

$this->inlandmarkers = $inlandmarkers;
    }else{
        $addInlandForecast = 'null';
    $this->inlandmarkers = 'null';
        $this->inlandpolygons = 'null'; 
        $this->inlandlatestGeneralData = 'null';
        $this->inlandperiod = 'null';
        $this->inlandweather = 'null';
        $this->inlandwinddir = 'null'; 
        $this->inlandwind = 'null';
       $this->inlanddistrict='null';
       $this->inlandcurrentConditionminTemp = 'null';
       $this->inlandcurrentConditionmaxTemp =  'null';
        
     $this->inlandeachDistrictWeather = 'null';

    }
}



}else if($inlandwhatthisIsIt == 'Evening'){
// get the latest Evening forecast from the evening_general_variables table
$latestEveningForecastId = Inland_Evening_general_variables::whereDate('date', today())->latest('created_at')->value('inland_forecast_id');
// dd($latestAfternoonForecastId);
if(!is_null($latestEveningForecastId)){
// now get the parent id from the addInlandForecast table
$addInlandForecast = InlandForecast::where('publishType', 'Publish-Forecast')->find($latestEveningForecastId);

//  now i can acess all the evening date from all the evening table in mysql
$this->inlandlatestGeneralData =  $addInlandForecast->inlandevening_general_variables();
$this->inlandeachDistrictWeather = $addInlandForecast->inlandevening_table_values()->where('districts', '!=', 'ADA')->get();


$this->inlandcurrentConditionminTemp = $addInlandForecast->inlandmorning_general_variables()->value('min_temp');
$this->inlandcurrentConditionmaxTemp = $addInlandForecast->inlandmorning_general_variables()->value('max_temp');
  $this->inlandwind =   $addInlandForecast->inlandevening_table_values()->where('districts', 'ADA')->value('wind');
  $this->inlanddistrict =  $addInlandForecast->inlandevening_table_values()->where('districts', 'ADA')->value('districts');
 $this->inlandweather =  $addInlandForecast->inlandevening_table_values()->where('districts', 'ADA')->value('weather');
$this->inlandwinddir = $this->endsWith($this->inlandwind);
  $this->inlandperiod = "Evening(6:00PM - 11:59PM)UTC";

$inlandpolugon = [];
  $inlandpolygonns=  $addInlandForecast->inlandevening_polygons()->pluck('cordinate')->all();
$inlandcolors= $addInlandForecast->inlandevening_polygons()->pluck('color')->all();
$inlandpolygonId = $addInlandForecast->inlandevening_polygons()->pluck('polygonId')->all();
foreach ($inlandpolygonns as $index => $inlandpolygon) {
    $inlandpolugonn = [
      'polygonId' => $inlandpolygonId[$index],
      'polygon' =>  $inlandpolygon,
      'color' => $inlandcolors[$index],
]; 
$inlandpolugon[] = $inlandpolugonn;
}

$this->inlandpolygons =$inlandpolugon;

// get the inlandmarkers
$inlandmarkers = [];
$inlandmarkerslat = $addInlandForecast->inlandevening_markers()->pluck('lat')->all();
$inlandmarkerslng = $addInlandForecast->inlandevening_markers()->pluck('lng')->all();
$inlandcontype = $addInlandForecast->inlandevening_markers()->pluck('icontype')->all();
$inlandmarkerIds = $addInlandForecast->inlandevening_markers()->pluck('markerId')->all();
foreach ($inlandmarkerIds as $index => $inlandmarkerId) {
    $inlandmarker = [
        'markerId' => $inlandmarkerId,
        'markerslnglat' => [
            'lng' => $inlandmarkerslng[$index],
            'lat' => $inlandmarkerslat[$index],
        ],
        'icontype' => $inlandcontype[$index],
    ];

    $inlandmarkers[] = $inlandmarker;
}

$this->inlandmarkers = $inlandmarkers;


}else{
    $inlandyesterday = Carbon::now()->subDay()->format('Y-m-d');
    // get the yesterday Evening forecast from the evening_general_variables table
$latestEveningForecastId = Inland_Evening_general_variables::whereDate('date', $inlandyesterday)->latest('created_at')->value('inland_forecast_id');
if(!is_null($latestEveningForecastId)){
    // now get the parent id from the addInlandForecast table
$addInlandForecast = InlandForecast::where('publishType', 'Publish-Forecast')->find($latestEveningForecastId);

//  now i can acess all the evening date from all the evening table in mysql
$this->inlandlatestGeneralData =  $addInlandForecast->inlandevening_general_variables();
$this->inlandeachDistrictWeather = $addInlandForecast->inlandevening_table_values()->where('districts', '!=', 'ADA')->get();


$this->inlandcurrentConditionminTemp = $addInlandForecast->inlandmorning_general_variables()->value('min_temp');
$this->inlandcurrentConditionmaxTemp = $addInlandForecast->inlandmorning_general_variables()->value('max_temp');
  $this->inlandwind =   $addInlandForecast->inlandevening_table_values()->where('districts', 'ADA')->value('wind');
  $this->inlanddistrict =  $addInlandForecast->inlandevening_table_values()->where('districts', 'ADA')->value('districts');
 $this->inlandweather =  $addInlandForecast->inlandevening_table_values()->where('districts', 'ADA')->value('weather');
$this->inlandwinddir = $this->endsWith($this->inlandwind);
  $this->inlandperiod = "Evening(6:00PM - 11:59PM)UTC";
 
$inlandpolugon = [];
$inlandpolygonns=  $addInlandForecast->inlandevening_polygons()->pluck('cordinate')->all();
$inlandcolors= $addInlandForecast->inlandevening_polygons()->pluck('color')->all();
$inlandpolygonId = $addInlandForecast->inlandevening_polygons()->pluck('polygonId')->all();
foreach ($inlandpolygonns as $index => $inlandpolygon) {
  $inlandpolugonn = [
    'polygonId' => $inlandpolygonId[$index],
    'polygon' =>  $inlandpolygon,
    'color' => $inlandcolors[$index],
]; 
$inlandpolugon[] = $inlandpolugonn;
}

$this->inlandpolygons =$inlandpolugon;
 
// get the inlandmarkers
$inlandmarkers = [];
$inlandmarkerslat = $addInlandForecast->inlandevening_markers()->pluck('lat')->all();
$inlandmarkerslng = $addInlandForecast->inlandevening_markers()->pluck('lng')->all();
$inlandcontype = $addInlandForecast->inlandevening_markers()->pluck('icontype')->all();
$inlandmarkerIds = $addInlandForecast->inlandevening_markers()->pluck('markerId')->all();
foreach ($inlandmarkerIds as $index => $inlandmarkerId) {
    $inlandmarker = [
        'markerId' => $inlandmarkerId,
        'markerslnglat' => [
            'lng' => $inlandmarkerslng[$index],
            'lat' => $inlandmarkerslat[$index],
        ],
        'icontype' => $inlandcontype[$index],
    ];

    $inlandmarkers[] = $inlandmarker;
}

$this->inlandmarkers = $inlandmarkers;
 

}else{
    $addInlandForecast = 'null';
    $this->inlandmarkers = 'null';
    $this->inlandpolygons = 'null'; 
    $this->inlandlatestGeneralData = 'null';
    $this->inlandperiod = 'null';
    $this->inlandweather = 'null';
    $this->inlandwinddir = 'null'; 
    $this->inlandwind = 'null';
   $this->inlanddistrict='null';
   $this->inlandcurrentConditionminTemp = 'null';
    $this->inlandcurrentConditionmaxTemp =  'null'; 
 $this->inlandeachDistrictWeather = 'null';
}
}
}

//24HRS  get the latest forecast from the inlandmorning_general_variables table
$inlandlatestForecastIdM = Inland_Morning_general_variables::whereDate('date', today())->latest('created_at')->value('inland_forecast_id');
if( !is_null($inlandlatestForecastIdM)){
//24HRS now get the parent id from the addInlandForecast table
$addInlandForecastM = InlandForecast::where('publishType', 'Publish-Forecast')->find($inlandlatestForecastIdM);
$inlandwindM =   $addInlandForecastM->inlandmorning_table_values()->where('districts', 'ADA')->value('wind');
$inlandweatherM =  $addInlandForecastM->inlandmorning_table_values()->where('districts', 'ADA')->value('weather');
$inlandwinddirM = $this->endsWith($inlandwindM);
}else{
    $inlandyesterday = Carbon::now()->subDay()->format('Y-m-d');
    //24HRS  get the latest forecast from the inlandmorning_general_variables table
$inlandlatestForecastIdM = Inland_Morning_general_variables::whereDate('date', $inlandyesterday)->latest('created_at')->value('inland_forecast_id');
if(!is_null($inlandlatestForecastIdM)){
    //24HRS now get the parent id from the addInlandForecast table
$addInlandForecastM = InlandForecast::where('publishType', 'Publish-Forecast')->find($inlandlatestForecastIdM);
$inlandwindM =   $addInlandForecastM->inlandmorning_table_values()->where('districts', 'ADA')->value('wind');
$inlandweatherM =  $addInlandForecastM->inlandmorning_table_values()->where('districts', 'ADA')->value('weather');
$inlandwinddirM = $this->endsWith($inlandwindM);
}else{
    $addInlandForecastM = 'null';
    $inlandwindM =   'null';
    $inlandweatherM = 'null';
    $inlandwinddirM = 'null';
}

}



// =================================================afternoon=========================================
//24HRS  get the latest forecast from the inlandmorning_general_variables table
$inlandlatestForecastIdA = Inland_Afternoon_general_variables::whereDate('date', today())->latest('created_at')->value('inland_forecast_id');
if( !is_null($inlandlatestForecastIdA)){
//24HRS now get the parent id from the addInlandForecast table
$addInlandForecastA = InlandForecast::where('publishType', 'Publish-Forecast')->find($inlandlatestForecastIdA);
$inlandwindA =   $addInlandForecastA->inlandafternoon_table_values()->where('districts', 'ADA')->value('wind');
$inlandweatherA =  $addInlandForecastA->inlandafternoon_table_values()->where('districts', 'ADA')->value('weather');
$inlandwinddirA = $this->endsWith($inlandwindA);
}// else use yesterday's forecast
else{
    $inlandyesterday = Carbon::now()->subDay()->format('Y-m-d');
    if(!is_null($inlandlatestForecastIdA)){
    //24HRS  get the latest forecast from the inlandmorning_general_variables table
$inlandlatestForecastIdA = Inland_Afternoon_general_variables::whereDate('date',  $inlandyesterday)->latest('created_at')->value('inland_forecast_id');
    //24HRS now get the parent id from the addInlandForecast table
$addInlandForecastA = InlandForecast::where('publishType', 'Publish-Forecast')->find($inlandlatestForecastIdA);
$inlandwindA =   $addInlandForecastA->inlandafternoon_table_values()->where('districts', 'ADA')->value('wind');
$inlandweatherA =  $addInlandForecastA->inlandafternoon_table_values()->where('districts', 'ADA')->value('weather');
$inlandwinddirA = $this->endsWith($inlandwindA);
    }else{
        $addInlandForecastA = 'null';
        $inlandwindA =    'null';
        $inlandweatherA =  'null';
        $inlandwinddirA =  'null';
    }

}
// =================================================EVENING=========================================
//24HRS  get the latest forecast from the evening_general_variables table
$inlandlatestForecastIdE = Inland_Evening_general_variables::whereDate('date', today())->latest('created_at')->value('inland_forecast_id');
// if today's evening table forecast is available
if( !is_null($inlandlatestForecastIdE)){
//24HRS now get the parent id from the addInlandForecast table
$addInlandForecastE = InlandForecast::where('publishType', 'Publish-Forecast')->find($inlandlatestForecastIdE);
$inlandwindE =   $addInlandForecastE->inlandevening_table_values()->where('districts', 'ADA')->value('wind');
$inlandweatherE =  $addInlandForecastE->inlandevening_table_values()->where('districts', 'ADA')->value('weather');
$inlandwinddirE = $this->endsWith($inlandwindE);
}else{
    $inlandyesterday = Carbon::now()->subDay()->format('Y-m-d');
//24HRS  get the latest forecast from the evening_general_variables table
$inlandlatestForecastIdE = Inland_Evening_general_variables::whereDate('date', $inlandyesterday)->latest('created_at')->value('inland_forecast_id');
if( !is_null($inlandlatestForecastIdE)){
    //24HRS now get the parent id from the addInlandForecast table
$addInlandForecastE = InlandForecast::where('publishType', 'Publish-Forecast')->find($inlandlatestForecastIdE);
$inlandwindE =   $addInlandForecastE->inlandevening_table_values()->where('districts', 'ADA')->value('wind');
$inlandweatherE =  $addInlandForecastE->inlandevening_table_values()->where('districts', 'ADA')->value('weather');
$inlandwinddirE = $this->endsWith($inlandwindE);
}else{
    $addInlandForecastE = 'null';
$inlandwindE =   'null';
$inlandweatherE =  'null';
$inlandwinddirE = 'null';
}
}






// =======================================end of  INLAND FORECAST ===================

// dd($this->inlandpolygons);
// dd($this->inlandeachDistrictWeather);
//  dd($this->marinedata);
        return view('welcome', [
        'districts' => $districts, 
        'inlanddistricts' => $inlanddistricts,
        'time' => $this->time,
        'addInlandForecast' => $addInlandForecast,
        'addDailyForecast' => $addDailyForecast,
        'inlandcurrentConditionminTemps' => $this->inlandcurrentConditionminTemp,
        'inlandcurrentConditionmaxTemps' => $this->inlandcurrentConditionmaxTemp,
        'currentConditionItd' =>$this->currentConditionItd,
        'currentConditionRH' => $this->currentConditionRH,
        'currentConditionRain' => $this->currentConditionRain,
        'minTemp' => $this->minTemp,
        'maxTemp' => $this->maxTemp,
        'inlandwind' => strtoupper($this->inlandwind), 
        'wind' => strtoupper($this->wind), 
        'inlanddistrict' =>  $this->inlanddistrict,
        'district' =>  $this->district,
        'inlandweather' => $this->inlandweather,
        'weather' => $this->weather,
        'inlandwinddir' => $this->inlandwinddir,
        'winddir' => $this->winddir,
        'inlandperiod' => $this->inlandperiod,
        'period' => $this->period,
        'inlandpolygons' => $this->inlandpolygons,
        'polygon' => $this->polygons,
        'inlandmarkers' => $this->inlandmarkers,
        'markers' => $this->markers,
        'inlandweatherM' => $inlandweatherM,
        'weatherM' => $weatherM,
        'minTempM' => $minTempM,
        'maxTempM' => $maxTempM,
        'inlandwindM' => $inlandwindM,
        'windM' => $windM,
        'inlandwinddirM' => $inlandwinddirM,
        'winddirM' => $winddirM,
        'inlandweatherA' => $inlandweatherA,
        'weatherA' => $weatherA,
        'minTempA' => $minTempA,
        'maxTempA' => $maxTempA,
        'inlandwindA' => $inlandwindA,
        'windA' => $windA,
        'inlandwinddirA' => $inlandwinddirA,
        'winddirA' => $winddirA,
        'inlandweatherE' => $inlandweatherE,
        'weatherE' => $weatherE,
        'minTempE' => $minTempE,
        'maxTempE' => $maxTempE,
        'inlandwindE' => $inlandwindE,
        'windE' => $windE,
        'inlandwinddirE' => $inlandwinddirE,
        'winddirE' => $winddirE,
        'inlandeachDistrictWeather' =>$this->inlandeachDistrictWeather,
        'eachDistrictWeathers' =>$this->eachDistrictWeather,
        'fivedayforecasts' => $this->fivedayforecast,
        'spatialRainfallImage'=> $this->spatialRainfallImage,
        'spatialTempImage'=> $this->spatialTempImage,
        'marinedata' => $this->marinedata,
        'marinepolygons' => $this->marinepolygons,
        'marinemarkers' =>  $this->marinemarkers,
        'timeOfDay' => $this->timeOfDay(),
        'seasonalForecasts' => $this->seasonalForecast
    ]);
    }



// on district changed
public function seeDetailsOfCity($city)
{

    try {
        
                // GET THE SPATIAL TEMPERATURE IMAGE URL
$this->seasonalForecast = Seasonalforecast::orderBy('created_at', 'desc')->get();

  
// get marine data from the Marineforecast database table:
$marineForecast = MarineForecast::latest()->where('publishType','PUBLISHED')->first();

if(isset($marineForecast)){

$marinepolugon = [];
$marinepolygonns=  $marineForecast->marine_polygons()->pluck('cordinate')->all();
$inlandcolors= $marineForecast->marine_polygons()->pluck('color')->all();
$marinepolygonId = $marineForecast->marine_polygons()->pluck('polygonId')->all();

if(!empty($marinepolygonId)){
foreach ($marinepolygonns as $index => $marinepolygon) {
  $marinepolugonn = [
    'polygonId' => $marinepolygonId[$index],
    'polygon' =>  $marinepolygon,
    'color' => $inlandcolors[$index],
]; 
$marinepolugon[] = $marinepolugonn;
}

$this->marinepolygons = $marinepolugon;
}else{
$this->marinepolygons = "null";
}

// get the marinemarkers
$marinemarkers = [];
$marinemarkerslat = $marineForecast->marine_markers()->pluck('lat')->all();
$marinemarkerslng = $marineForecast->marine_markers()->pluck('lng')->all();
$marinecontype = $marineForecast->marine_markers()->pluck('icontype')->all();
$marinemarkerIds = $marineForecast->marine_markers()->pluck('markersId')->all();

if(!empty($marinemarkerIds)){
foreach ($marinemarkerIds as $index => $marinemarkerId) {
    $marinemarker = [
        'markerId' => $marinemarkerId,
        'markerslnglat' => [
            'lng' => $marinemarkerslng[$index],
            'lat' => $marinemarkerslat[$index],
        ],
        'icontype' => $marinecontype[$index],
    ];

    $marinemarkers[] = $marinemarker;
}

$this->marinemarkers = $marinemarkers;

}else{
$this->marinemarkers = "null";
}

$this->marinedata = $marineForecast;

}else{
    $this->marinemarkers = "null";
    $this->marinepolygons = "null";

}

// GET THE SPATIAL RAINFALL IMAGE URL
$this->spatialRainfallImage = AddrainTempUpload::where('imageType', 'rain')
->latest('created_at')
->limit(5)
->get();

// GET THE SPATIAL TEMPERATURE IMAGE URL
$this->spatialTempImage = AddrainTempUpload::where('imageType', 'temp')
->latest('created_at')
->limit(5)
->get();

// Retrieve records from the database
$startDate = Carbon::today();
$endDate = Carbon::today()->addDays(5);

$dates = [];
$existingDates = [];

while ($startDate <= $endDate) {
    $date = $startDate->toDateString();

    if (!in_array($date, $existingDates)) {
        $dates[] = $date;
        $existingDates[] = $date;
    }

    $startDate->addDay();
}

// Retrieve records from the database
$tfivedayforecast =  AddFiveDayForecast::whereIn('date', $dates)->latest('created_at')
->take(5)->get();


$tfivedayforecast = AddFiveDayForecast::whereIn('date', $dates)->where('district', $city)->where('status', 'Approved')->latest('created_at')
->take(5)->get();
// Assuming you have retrieved the records and stored them in $this->fivedayforecast
$this->fivedayforecast = $tfivedayforecast->sortBy(function ($forecast) {
    return Carbon::parse($forecast->date)->diffInDays(Carbon::today());
});


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
$this->eachDistrictWeather = $addDailyForecast->morning_table_values()->where('districts', '!=', $selectedCity)->get();


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
$iconsize = $addDailyForecast->morning_markers()->pluck('iconsize')->all();
$markerIds = $addDailyForecast->morning_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
        'iconsize' => $iconsize[$index],
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
if(!is_null($latestMorningForecastId)){
// now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestMorningForecastId);

//  now i can acess all the morning date from all the morning table in mysql
$this->latestGeneralData =  $addDailyForecast->morning_general_variables();
$this->eachDistrictWeather = $addDailyForecast->morning_table_values()->where('districts', '!=', $selectedCity)->get();


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
$iconsize = $addDailyForecast->morning_markers()->pluck('iconsize')->all();
$markerIds = $addDailyForecast->morning_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
        'iconsize' => $iconsize[$index],
    ];

    $markers[] = $marker;
}

$this->markers = $markers;
}else{
    $addDailyForecast = 'null';
    $this->markers = 'null';
    $this->polygons = 'null'; 
    $this->latestGeneralData = 'null';
    $this->period = 'null';
    $this->weather = 'null';
    $this->winddir = 'null';
    $this->weather = 'null';
    $this->minTemp = 'null';
$this->maxTemp =  'null';
  $this->wind = 'null';
$this->district='null';
$this->currentConditionItd = 'null';
$this->currentConditionRH ='null';
$this->currentConditionRain = 'null';
$this->latestGeneralData = 'null';
$this->eachDistrictWeather = 'null';
}

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
$this->eachDistrictWeather = $addDailyForecast->afternoon_table_values()->where('districts', '!=', $selectedCity)->get();


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
$iconsize = $addDailyForecast->afternoon_markers()->pluck('iconsize')->all();
$markerIds = $addDailyForecast->afternoon_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
        'iconsize' => $iconsize[$index],
    ];

    $markers[] = $marker;
}

$this->markers = $markers;


}else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    // get the latest Afternoon forecast from the afternoon_general_variables table
$latestAfternoonForecastId = Afternoon_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('add_daily_forecast_id');
if(!is_null($latestAfternoonForecastId)){
    // now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestAfternoonForecastId);

//  now i can acess all the afternoon date from all the afternoon table in mysql
$this->latestGeneralData =  $addDailyForecast->afternoon_general_variables();
$this->eachDistrictWeather = $addDailyForecast->afternoon_table_values()->where('districts', '!=', $selectedCity)->get();


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
$iconsize = $addDailyForecast->afternoon_markers()->pluck('iconsize')->all();
$markerIds = $addDailyForecast->afternoon_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
        'iconsize' => $iconsize[$index],
    ];

    $markers[] = $marker;
}

$this->markers = $markers;
}else{
    $addDailyForecast = 'null';
    $this->markers = 'null';
    $this->polygons = 'null'; 
    $this->latestGeneralData = 'null';
    $this->period = 'null';
    $this->weather = 'null';
    $this->winddir = 'null';
    $this->weather = 'null';
    $this->minTemp = 'null';
$this->maxTemp =  'null';
  $this->wind = 'null';
$this->district='null';
$this->currentConditionItd = 'null';
$this->currentConditionRH ='null';
$this->currentConditionRain = 'null';
$this->latestGeneralData = 'null';
$this->eachDistrictWeather = 'null';
}
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
$this->eachDistrictWeather = $addDailyForecast->evening_table_values()->where('districts', '!=', $selectedCity)->get();


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
$iconsize = $addDailyForecast->evening_markers()->pluck('iconsize')->all();
$markerIds = $addDailyForecast->evening_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
        'iconsize' => $iconsize[$index],
    ];

    $markers[] = $marker;
}

$this->markers = $markers;

}else{
    $yesterday = Carbon::now()->subDay()->format('Y-m-d');
    // get the latest Evening forecast from the evening_general_variables table
$latestEveningForecastId = Evening_general_variables::whereDate('date', $yesterday)->latest('created_at')->value('add_daily_forecast_id');
if(!is_null($latestEveningForecastId)){
    // now get the parent id from the addDailyForecast table
$addDailyForecast = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestEveningForecastId);

//  now i can acess all the evening date from all the evening table in mysql
$this->latestGeneralData =  $addDailyForecast->evening_general_variables();
$this->eachDistrictWeather = $addDailyForecast->evening_table_values()->where('districts', '!=', $selectedCity)->get();


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
$iconsize = $addDailyForecast->evening_markers()->pluck('iconsize')->all();
$markerIds = $addDailyForecast->evening_markers()->pluck('markerId')->all();
foreach ($markerIds as $index => $markerId) {
    $marker = [
        'markerId' => $markerId,
        'markerslnglat' => [
            'lng' => $markerslng[$index],
            'lat' => $markerslat[$index],
        ],
        'icontype' => $icontype[$index],
        'iconsize' => $iconsize[$index],
    ];

    $markers[] = $marker;
}

$this->markers = $markers;

}else{
    $addDailyForecast = 'null';
    $this->markers = 'null';
    $this->polygons = 'null'; 
    $this->latestGeneralData = 'null';
    $this->period = 'null';
    $this->weather = 'null';
    $this->winddir = 'null';
    $this->weather = 'null';
    $this->minTemp = 'null';
$this->maxTemp =  'null';
  $this->wind = 'null';
$this->district='null';
$this->currentConditionItd = 'null';
$this->currentConditionRH ='null';
$this->currentConditionRain = 'null';
$this->latestGeneralData = 'null';
$this->eachDistrictWeather = 'null';
}
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
if(!is_null($latestForecastIdM)){
//24HRS now get the parent id from the addDailyForecast table
$addDailyForecastM = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestForecastIdM);
$minTempM =   $addDailyForecastM->morning_table_values()->where('districts', $selectedCity)->value('min_temp');
$maxTempM =   $addDailyForecastM->morning_table_values()->where('districts', $selectedCity)->value('max_temp');
$windM =   $addDailyForecastM->morning_table_values()->where('districts', $selectedCity)->value('wind');
$weatherM =  $addDailyForecastM->morning_table_values()->where('districts', $selectedCity)->value('weather');
$winddirM = $this->endsWith($windM);
}else{
    $addDailyForecastM = 'null';
    $minTempM =  'null';
    $maxTempM =   'null';
    $windM =   'null';
    $weatherM = 'null';
    $winddirM = 'null';
}

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
    if( !is_null($latestForecastIdA)){
    //24HRS now get the parent id from the addDailyForecast table
    $addDailyForecastA = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestForecastIdA);

    $minTempA =   $addDailyForecastA->afternoon_table_values()->where('districts', $selectedCity)->value('min_temp');
$maxTempA =   $addDailyForecastA->afternoon_table_values()->where('districts', $selectedCity)->value('max_temp');
$windA =   $addDailyForecastA->afternoon_table_values()->where('districts', $selectedCity)->value('wind');
$weatherA =  $addDailyForecastA->afternoon_table_values()->where('districts', $selectedCity)->value('weather');
$winddirA = $this->endsWith($windA);
}else{
    $addDailyForecastA = 'null';
    $windA =   'null'; 
    $weatherA = 'null';
    $winddirA ='null';
    $minTempA =  'null';
    $maxTempA =  'null';
}
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
if( !is_null($latestForecastIdE )){
    //24HRS now get the parent id from the addDailyForecast table
$addDailyForecastE = AddDailyForecast::where('publishType', 'Publish-Forecast')->find($latestForecastIdE);
$minTempE =   $addDailyForecastE->evening_table_values()->where('districts', $selectedCity)->value('min_temp');
$maxTempE =   $addDailyForecastE->evening_table_values()->where('districts', $selectedCity)->value('max_temp');
$windE =   $addDailyForecastE->evening_table_values()->where('districts', $selectedCity)->value('wind');
$weatherE =  $addDailyForecastE->evening_table_values()->where('districts', $selectedCity)->value('weather');
$winddirE = $this->endsWith($windE);
}else{
    $addDailyForecastE = 'null';
    $minTempE = 'null';
    $maxTempE = 'null';
    $windE = 'null';
    $weatherE =  'null';
    $winddirE = 'null'; 
}
}



// =======================================INLAND FORECAST =================================


$inlandwhatthisIsIt = $this->timeOfDay();

$inlanddistricts = DB::table('marine_districts')->orderBy('districtname')->get();

// NOW GET THE CONDITIONS BY TIME OF THE DAY
if($inlandwhatthisIsIt == 'Morning'){
// get the latest morning forecast from the inland_morning_general_variables table
$inlandlatestMorningForecastId = Inland_Morning_general_variables::whereDate('date', today())->latest('created_at')->value('inland_forecast_id');
// dd($latestAfternoonForecastId);
if(!is_null($inlandlatestMorningForecastId)){
// now get the parent id from the inlandForecast table
$addInlandForecast = InlandForecast::where('publishType', 'Publish-Forecast')->find($inlandlatestMorningForecastId);

//  now i can acess all the morning date from all the morning table in mysql
$this->inlandlatestGeneralData =  $addInlandForecast->inlandmorning_general_variables();
$this->inlandeachDistrictWeather = $addInlandForecast->inlandmorning_table_values()->where('districts', '!=', $selectedCity)->get();


$this->inlandcurrentConditionminTemp = $addInlandForecast->inlandmorning_general_variables()->value('min_temp');
$this->inlandcurrentConditionmaxTemp = $addInlandForecast->inlandmorning_general_variables()->value('max_temp');

$this->inlandwind =   $addInlandForecast->inlandmorning_table_values()->where('districts', $selectedCity)->value('wind');
$this->inlanddistrict =  $addInlandForecast->inlandmorning_table_values()->where('districts', $selectedCity)->value('districts');
$this->inlandweather =  $addInlandForecast->inlandmorning_table_values()->where('districts', $selectedCity)->value('weather');
$this->inlandwinddir = $this->endsWith($this->inlandwind);
$this->inlandperiod = "Morning(12:00AM - 5:59AM)UTC";
$inlandpolugon = [];
$inlandpolygonns=  $addInlandForecast->inlandmorning_polygons()->pluck('cordinate')->all();
$inlandcolors= $addInlandForecast->inlandmorning_polygons()->pluck('color')->all();
$inlandpolygonId = $addInlandForecast->inlandmorning_polygons()->pluck('polygonId')->all();
foreach ($inlandpolygonns as $index => $inlandpolygon) {
$inlandpolugonn = [
'polygonId' => $inlandpolygonId[$index],
'polygon' =>  $inlandpolygon,
'color' => $inlandcolors[$index],
]; 
$inlandpolugon[] = $inlandpolugonn;
}

$this->inlandpolygons =$inlandpolugon;
// get the inlandmarkers
$inlandmarkers = [];
$inlandmarkerslat = $addInlandForecast->inlandmorning_markers()->pluck('lat')->all();
$inlandmarkerslng = $addInlandForecast->inlandmorning_markers()->pluck('lng')->all();
$inlandcontype = $addInlandForecast->inlandmorning_markers()->pluck('icontype')->all();
$inlandmarkerIds = $addInlandForecast->inlandmorning_markers()->pluck('markerId')->all();
foreach ($inlandmarkerIds as $index => $inlandmarkerId) {
$inlandmarker = [
'markerId' => $inlandmarkerId,
'markerslnglat' => [
    'lng' => $inlandmarkerslng[$index],
    'lat' => $inlandmarkerslat[$index],
],
'icontype' => $inlandcontype[$index],
];

$inlandmarkers[] = $inlandmarker;
}

$this->inlandmarkers = $inlandmarkers;

}else{
$inlandyesterday = Carbon::now()->subDay()->format('Y-m-d');
// get the latest morning forecast from the inlandmorning_general_variables table
$inlandlatestMorningForecastId = Inland_Morning_general_variables::whereDate('date', $inlandyesterday)->latest('created_at')->value('inland_forecast_id');

if(!is_null($inlandlatestMorningForecastId)){
// now get the parent id from the addInlandForecast table
$addInlandForecast = InlandForecast::where('publishType', 'Publish-Forecast')->find($inlandlatestMorningForecastId);

//  now i can acess all the morning date from all the morning table in mysql
$this->inlandlatestGeneralData =  $addInlandForecast->inlandmorning_general_variables();
$this->inlandeachDistrictWeather = $addInlandForecast->inlandmorning_table_values()->where('districts', '!=', $selectedCity)->get();


$this->inlandcurrentConditionminTemp = $addInlandForecast->inlandmorning_general_variables()->value('min_temp');
$this->inlandcurrentConditionmaxTemp = $addInlandForecast->inlandmorning_general_variables()->value('max_temp');

$this->inlandwind =   $addInlandForecast->inlandmorning_table_values()->where('districts', $selectedCity)->value('wind');
$this->inlanddistrict =  $addInlandForecast->inlandmorning_table_values()->where('districts', $selectedCity)->value('districts');
$this->inlandweather =  $addInlandForecast->inlandmorning_table_values()->where('districts', $selectedCity)->value('weather');
$this->inlandwinddir = $this->endsWith($this->inlandwind);
$this->inlandperiod = "Morning(12:00AM - 5:59AM)UTC";
$inlandpolugon = [];
$inlandpolygonns=  $addInlandForecast->inlandmorning_polygons()->pluck('cordinate')->all();
$inlandcolors= $addInlandForecast->inlandmorning_polygons()->pluck('color')->all();
$inlandpolygonId = $addInlandForecast->inlandmorning_polygons()->pluck('polygonId')->all();
foreach ($inlandpolygonns as $index => $inlandpolygon) {
$inlandpolugonn = [
'polygonId' => $inlandpolygonId[$index],
'polygon' =>  $inlandpolygon,
'color' => $inlandcolors[$index],
]; 
$inlandpolugon[] = $inlandpolugonn;
}

$this->inlandpolygons =$inlandpolugon;
// get the inlandmarkers
$inlandmarkers = [];
$inlandmarkerslat = $addInlandForecast->inlandmorning_markers()->pluck('lat')->all();
$inlandmarkerslng = $addInlandForecast->inlandmorning_markers()->pluck('lng')->all();
$inlandcontype = $addInlandForecast->inlandmorning_markers()->pluck('icontype')->all();
$inlandmarkerIds = $addInlandForecast->inlandmorning_markers()->pluck('markerId')->all();
foreach ($inlandmarkerIds as $index => $inlandmarkerId) {
$inlandmarker = [
'markerId' => $inlandmarkerId,
'markerslnglat' => [
    'lng' => $inlandmarkerslng[$index],
    'lat' => $inlandmarkerslat[$index],
],
'icontype' => $inlandcontype[$index],
];

$inlandmarkers[] = $inlandmarker;
}

$this->inlandmarkers = $inlandmarkers;

}else{

$addInlandForecast = 'null';
$this->inlandmarkers = 'null';
$this->inlandpolygons = 'null'; 
$this->inlandlatestGeneralData = 'null';
$this->inlandperiod = 'null';
$this->inlandweather = 'null';
$this->inlandwinddir = 'null'; 
$this->inlandwind = 'null';
$this->inlanddistrict='null';
$this->inlandcurrentConditionminTemp ='null';
$this->inlandcurrentConditionmaxTemp = 'null';
$this->inlandeachDistrictWeather = 'null';
}
}
}else if($inlandwhatthisIsIt == 'Afternoon'){
// get the latest Afternoon forecast from the inlandafternoon_general_variables table
$latestAfternoonForecastId = Inland_Afternoon_general_variables::whereDate('date', today())->latest('created_at')->value('inland_forecast_id');
// dd($latestAfternoonForecastId);
if(!is_null($latestAfternoonForecastId)){
// now get the parent id from the addInlandForecast table
$addInlandForecast = InlandForecast::where('publishType', 'Publish-Forecast')->find($latestAfternoonForecastId);

//  now i can acess all the afternoon date from all the afternoon table in mysql
$this->inlandlatestGeneralData =  $addInlandForecast->inlandafternoon_general_variables();
$this->inlandeachDistrictWeather = $addInlandForecast->inlandafternoon_table_values()->where('districts', '!=', $selectedCity)->get();


$this->inlandcurrentConditionminTemp = $addInlandForecast->inlandmorning_general_variables()->value('min_temp');
$this->inlandcurrentConditionmaxTemp = $addInlandForecast->inlandmorning_general_variables()->value('max_temp');
$this->inlandwind =   $addInlandForecast->inlandafternoon_table_values()->where('districts', $selectedCity)->value('wind');
$this->inlanddistrict =  $addInlandForecast->inlandafternoon_table_values()->where('districts', $selectedCity)->value('districts');
$this->inlandweather =  $addInlandForecast->inlandafternoon_table_values()->where('districts', $selectedCity)->value('weather');
$this->inlandwinddir = $this->endsWith($this->inlandwind);
$this->inlandperiod = "Afternoon(12:00PM - 5:59PM)UTC";

$inlandpolugon = [];
$inlandpolygonns=  $addInlandForecast->inlandafternoon_polygons()->pluck('cordinate')->all();
$inlandcolors= $addInlandForecast->inlandafternoon_polygons()->pluck('color')->all();
$inlandpolygonId = $addInlandForecast->inlandafternoon_polygons()->pluck('polygonId')->all();
foreach ($inlandpolygonns as $index => $inlandpolygon) {
$inlandpolugonn = [
'polygonId' => $inlandpolygonId[$index],
'polygon' =>  $inlandpolygon,
'color' => $inlandcolors[$index],
]; 
$inlandpolugon[] = $inlandpolugonn;
}

$this->inlandpolygons =$inlandpolugon;

// get the inlandmarkers
$inlandmarkers = [];
$inlandmarkerslat = $addInlandForecast->inlandafternoon_markers()->pluck('lat')->all();
$inlandmarkerslng = $addInlandForecast->inlandafternoon_markers()->pluck('lng')->all();
$inlandcontype = $addInlandForecast->inlandafternoon_markers()->pluck('icontype')->all();
$inlandmarkerIds = $addInlandForecast->inlandafternoon_markers()->pluck('markerId')->all();
foreach ($inlandmarkerIds as $index => $inlandmarkerId) {
$inlandmarker = [
'markerId' => $inlandmarkerId,
'markerslnglat' => [
    'lng' => $inlandmarkerslng[$index],
    'lat' => $inlandmarkerslat[$index],
],
'icontype' => $inlandcontype[$index],
];

$inlandmarkers[] = $inlandmarker;
}

$this->inlandmarkers = $inlandmarkers;

}else{
$inlandyesterday = Carbon::now()->subDay()->format('Y-m-d');
$latestAfternoonForecastId = Inland_Afternoon_general_variables::whereDate('date', $inlandyesterday)->latest('created_at')->value('inland_forecast_id');
if(!is_null($latestAfternoonForecastId)){
// now get the parent id from the addInlandForecast table
$addInlandForecast = InlandForecast::where('publishType', 'Publish-Forecast')->find($latestAfternoonForecastId);

//  now i can acess all the afternoon date from all the afternoon table in mysql
$this->inlandlatestGeneralData =  $addInlandForecast->inlandafternoon_general_variables();
$this->inlandeachDistrictWeather = $addInlandForecast->inlandafternoon_table_values()->where('districts', '!=', $selectedCity)->get();


$this->inlandcurrentConditionminTemp = $addInlandForecast->inlandmorning_general_variables()->value('min_temp');
$this->inlandcurrentConditionmaxTemp = $addInlandForecast->inlandmorning_general_variables()->value('max_temp');

$this->inlandwind =   $addInlandForecast->inlandafternoon_table_values()->where('districts', $selectedCity)->value('wind');
$this->inlanddistrict =  $addInlandForecast->inlandafternoon_table_values()->where('districts', $selectedCity)->value('districts');
$this->inlandweather =  $addInlandForecast->inlandafternoon_table_values()->where('districts', $selectedCity)->value('weather');
$this->inlandwinddir = $this->endsWith($this->inlandwind);
$this->inlandperiod = "Afternoon(12:00PM - 5:59PM)UTC";

$inlandpolugon = [];
$inlandpolygonns=  $addInlandForecast->inlandafternoon_polygons()->pluck('cordinate')->all();
$inlandcolors= $addInlandForecast->inlandafternoon_polygons()->pluck('color')->all();
$inlandpolygonId = $addInlandForecast->inlandafternoon_polygons()->pluck('polygonId')->all();
foreach ($inlandpolygonns as $index => $inlandpolygon) {
$inlandpolugonn = [
'polygonId' => $inlandpolygonId[$index],
'polygon' =>  $inlandpolygon,
'color' => $inlandcolors[$index],
]; 
$inlandpolugon[] = $inlandpolugonn;
}

$this->inlandpolygons =$inlandpolugon;
// get the inlandmarkers
$inlandmarkers = [];
$inlandmarkerslat = $addInlandForecast->inlandafternoon_markers()->pluck('lat')->all();
$inlandmarkerslng = $addInlandForecast->inlandafternoon_markers()->pluck('lng')->all();
$inlandcontype = $addInlandForecast->inlandafternoon_markers()->pluck('icontype')->all();
$inlandmarkerIds = $addInlandForecast->inlandafternoon_markers()->pluck('markerId')->all();
foreach ($inlandmarkerIds as $index => $inlandmarkerId) {
$inlandmarker = [
'markerId' => $inlandmarkerId,
'markerslnglat' => [
    'lng' => $inlandmarkerslng[$index],
    'lat' => $inlandmarkerslat[$index],
],
'icontype' => $inlandcontype[$index],
];

$inlandmarkers[] = $inlandmarker;
}

$this->inlandmarkers = $inlandmarkers;
}else{
$addInlandForecast = 'null';
$this->inlandmarkers = 'null';
$this->inlandpolygons = 'null'; 
$this->inlandlatestGeneralData = 'null';
$this->inlandperiod = 'null';
$this->inlandweather = 'null';
$this->inlandwinddir = 'null'; 
$this->inlandwind = 'null';
$this->inlanddistrict='null';
$this->inlandcurrentConditionminTemp = 'null';
$this->inlandcurrentConditionmaxTemp =  'null';

$this->inlandeachDistrictWeather = 'null';

}
}



}else if($inlandwhatthisIsIt == 'Evening'){
// get the latest Evening forecast from the evening_general_variables table
$latestEveningForecastId = Inland_Evening_general_variables::whereDate('date', today())->latest('created_at')->value('inland_forecast_id');
// dd($latestAfternoonForecastId);
if(!is_null($latestEveningForecastId)){
// now get the parent id from the addInlandForecast table
$addInlandForecast = InlandForecast::where('publishType', 'Publish-Forecast')->find($latestEveningForecastId);

//  now i can acess all the evening date from all the evening table in mysql
$this->inlandlatestGeneralData =  $addInlandForecast->inlandevening_general_variables();
$this->inlandeachDistrictWeather = $addInlandForecast->inlandevening_table_values()->where('districts', '!=', $selectedCity)->get();


$this->inlandcurrentConditionminTemp = $addInlandForecast->inlandmorning_general_variables()->value('min_temp');
$this->inlandcurrentConditionmaxTemp = $addInlandForecast->inlandmorning_general_variables()->value('max_temp');
$this->inlandwind =   $addInlandForecast->inlandevening_table_values()->where('districts', $selectedCity)->value('wind');
$this->inlanddistrict =  $addInlandForecast->inlandevening_table_values()->where('districts', $selectedCity)->value('districts');
$this->inlandweather =  $addInlandForecast->inlandevening_table_values()->where('districts', $selectedCity)->value('weather');
$this->inlandwinddir = $this->endsWith($this->inlandwind);
$this->inlandperiod = "Evening(6:00PM - 11:59PM)UTC";

$inlandpolugon = [];
$inlandpolygonns=  $addInlandForecast->inlandevening_polygons()->pluck('cordinate')->all();
$inlandcolors= $addInlandForecast->inlandevening_polygons()->pluck('color')->all();
$inlandpolygonId = $addInlandForecast->inlandevening_polygons()->pluck('polygonId')->all();
foreach ($inlandpolygonns as $index => $inlandpolygon) {
$inlandpolugonn = [
'polygonId' => $inlandpolygonId[$index],
'polygon' =>  $inlandpolygon,
'color' => $inlandcolors[$index],
]; 
$inlandpolugon[] = $inlandpolugonn;
}

$this->inlandpolygons =$inlandpolugon;

// get the inlandmarkers
$inlandmarkers = [];
$inlandmarkerslat = $addInlandForecast->inlandevening_markers()->pluck('lat')->all();
$inlandmarkerslng = $addInlandForecast->inlandevening_markers()->pluck('lng')->all();
$inlandcontype = $addInlandForecast->inlandevening_markers()->pluck('icontype')->all();
$inlandmarkerIds = $addInlandForecast->inlandevening_markers()->pluck('markerId')->all();
foreach ($inlandmarkerIds as $index => $inlandmarkerId) {
$inlandmarker = [
'markerId' => $inlandmarkerId,
'markerslnglat' => [
    'lng' => $inlandmarkerslng[$index],
    'lat' => $inlandmarkerslat[$index],
],
'icontype' => $inlandcontype[$index],
];

$inlandmarkers[] = $inlandmarker;
}

$this->inlandmarkers = $inlandmarkers;


}else{
$inlandyesterday = Carbon::now()->subDay()->format('Y-m-d');
// get the yesterday Evening forecast from the evening_general_variables table
$latestEveningForecastId = Inland_Evening_general_variables::whereDate('date', $inlandyesterday)->latest('created_at')->value('inland_forecast_id');
if(!is_null($latestEveningForecastId)){
// now get the parent id from the addInlandForecast table
$addInlandForecast = InlandForecast::where('publishType', 'Publish-Forecast')->find($latestEveningForecastId);

//  now i can acess all the evening date from all the evening table in mysql
$this->inlandlatestGeneralData =  $addInlandForecast->inlandevening_general_variables();
$this->inlandeachDistrictWeather = $addInlandForecast->inlandevening_table_values()->where('districts', '!=', $selectedCity)->get();


$this->inlandcurrentConditionminTemp = $addInlandForecast->inlandmorning_general_variables()->value('min_temp');
$this->inlandcurrentConditionmaxTemp = $addInlandForecast->inlandmorning_general_variables()->value('max_temp');
$this->inlandwind =   $addInlandForecast->inlandevening_table_values()->where('districts', $selectedCity)->value('wind');
$this->inlanddistrict =  $addInlandForecast->inlandevening_table_values()->where('districts', $selectedCity)->value('districts');
$this->inlandweather =  $addInlandForecast->inlandevening_table_values()->where('districts', $selectedCity)->value('weather');
$this->inlandwinddir = $this->endsWith($this->inlandwind);
$this->inlandperiod = "Evening(6:00PM - 11:59PM)UTC";

$inlandpolugon = [];
$inlandpolygonns=  $addInlandForecast->inlandevening_polygons()->pluck('cordinate')->all();
$inlandcolors= $addInlandForecast->inlandevening_polygons()->pluck('color')->all();
$inlandpolygonId = $addInlandForecast->inlandevening_polygons()->pluck('polygonId')->all();
foreach ($inlandpolygonns as $index => $inlandpolygon) {
$inlandpolugonn = [
'polygonId' => $inlandpolygonId[$index],
'polygon' =>  $inlandpolygon,
'color' => $inlandcolors[$index],
]; 
$inlandpolugon[] = $inlandpolugonn;
}

$this->inlandpolygons =$inlandpolugon;

// get the inlandmarkers
$inlandmarkers = [];
$inlandmarkerslat = $addInlandForecast->inlandevening_markers()->pluck('lat')->all();
$inlandmarkerslng = $addInlandForecast->inlandevening_markers()->pluck('lng')->all();
$inlandcontype = $addInlandForecast->inlandevening_markers()->pluck('icontype')->all();
$inlandmarkerIds = $addInlandForecast->inlandevening_markers()->pluck('markerId')->all();
foreach ($inlandmarkerIds as $index => $inlandmarkerId) {
$inlandmarker = [
'markerId' => $inlandmarkerId,
'markerslnglat' => [
    'lng' => $inlandmarkerslng[$index],
    'lat' => $inlandmarkerslat[$index],
],
'icontype' => $inlandcontype[$index],
];

$inlandmarkers[] = $inlandmarker;
}

$this->inlandmarkers = $inlandmarkers;


}else{
$addInlandForecast = 'null';
$this->inlandmarkers = 'null';
$this->inlandpolygons = 'null'; 
$this->inlandlatestGeneralData = 'null';
$this->inlandperiod = 'null';
$this->inlandweather = 'null';
$this->inlandwinddir = 'null'; 
$this->inlandwind = 'null';
$this->inlanddistrict='null';
$this->inlandcurrentConditionminTemp = 'null';
$this->inlandcurrentConditionmaxTemp =  'null'; 
$this->inlandeachDistrictWeather = 'null';
}
}
}

//24HRS  get the latest forecast from the inlandmorning_general_variables table
$inlandlatestForecastIdM = Inland_Morning_general_variables::whereDate('date', today())->latest('created_at')->value('inland_forecast_id');
if( !is_null($inlandlatestForecastIdM)){
//24HRS now get the parent id from the addInlandForecast table
$addInlandForecastM = InlandForecast::where('publishType', 'Publish-Forecast')->find($inlandlatestForecastIdM);
$inlandwindM =   $addInlandForecastM->inlandmorning_table_values()->where('districts', $selectedCity)->value('wind');
$inlandweatherM =  $addInlandForecastM->inlandmorning_table_values()->where('districts', $selectedCity)->value('weather');
$inlandwinddirM = $this->endsWith($inlandwindM);
}else{
$inlandyesterday = Carbon::now()->subDay()->format('Y-m-d');
//24HRS  get the latest forecast from the inlandmorning_general_variables table
$inlandlatestForecastIdM = Inland_Morning_general_variables::whereDate('date', $inlandyesterday)->latest('created_at')->value('inland_forecast_id');
if(!is_null($inlandlatestForecastIdM)){
//24HRS now get the parent id from the addInlandForecast table
$addInlandForecastM = InlandForecast::where('publishType', 'Publish-Forecast')->find($inlandlatestForecastIdM);
$inlandwindM =   $addInlandForecastM->inlandmorning_table_values()->where('districts', $selectedCity)->value('wind');
$inlandweatherM =  $addInlandForecastM->inlandmorning_table_values()->where('districts', $selectedCity)->value('weather');
$inlandwinddirM = $this->endsWith($inlandwindM);
}else{
$addInlandForecastM = 'null';
$inlandwindM =   'null';
$inlandweatherM = 'null';
$inlandwinddirM = 'null';
}

}



// =================================================afternoon=========================================
//24HRS  get the latest forecast from the inlandmorning_general_variables table
$inlandlatestForecastIdA = Inland_Afternoon_general_variables::whereDate('date', today())->latest('created_at')->value('inland_forecast_id');
if( !is_null($inlandlatestForecastIdA)){
//24HRS now get the parent id from the addInlandForecast table
$addInlandForecastA = InlandForecast::where('publishType', 'Publish-Forecast')->find($inlandlatestForecastIdA);
$inlandwindA =   $addInlandForecastA->inlandafternoon_table_values()->where('districts', $selectedCity)->value('wind');
$inlandweatherA =  $addInlandForecastA->inlandafternoon_table_values()->where('districts', $selectedCity)->value('weather');
$inlandwinddirA = $this->endsWith($inlandwindA);
}// else use yesterday's forecast
else{
$inlandyesterday = Carbon::now()->subDay()->format('Y-m-d');
if(!is_null($inlandlatestForecastIdA)){
//24HRS  get the latest forecast from the inlandmorning_general_variables table
$inlandlatestForecastIdA = Inland_Afternoon_general_variables::whereDate('date',  $inlandyesterday)->latest('created_at')->value('inland_forecast_id');
//24HRS now get the parent id from the addInlandForecast table
$addInlandForecastA = InlandForecast::where('publishType', 'Publish-Forecast')->find($inlandlatestForecastIdA);
$inlandwindA =   $addInlandForecastA->inlandafternoon_table_values()->where('districts', $selectedCity)->value('wind');
$inlandweatherA =  $addInlandForecastA->inlandafternoon_table_values()->where('districts', $selectedCity)->value('weather');
$inlandwinddirA = $this->endsWith($inlandwindA);
}else{
$addInlandForecastA = 'null';
$inlandwindA =    'null';
$inlandweatherA =  'null';
$inlandwinddirA =  'null';
}

}
// =================================================EVENING=========================================
//24HRS  get the latest forecast from the evening_general_variables table
$inlandlatestForecastIdE = Inland_Evening_general_variables::whereDate('date', today())->latest('created_at')->value('inland_forecast_id');
// if today's evening table forecast is available
if( !is_null($inlandlatestForecastIdE)){
//24HRS now get the parent id from the addInlandForecast table
$addInlandForecastE = InlandForecast::where('publishType', 'Publish-Forecast')->find($inlandlatestForecastIdE);
$inlandwindE =   $addInlandForecastE->inlandevening_table_values()->where('districts', $selectedCity)->value('wind');
$inlandweatherE =  $addInlandForecastE->inlandevening_table_values()->where('districts', $selectedCity)->value('weather');
$inlandwinddirE = $this->endsWith($inlandwindE);
}else{
$inlandyesterday = Carbon::now()->subDay()->format('Y-m-d');
//24HRS  get the latest forecast from the evening_general_variables table
$inlandlatestForecastIdE = Inland_Evening_general_variables::whereDate('date', $inlandyesterday)->latest('created_at')->value('inland_forecast_id');
if( !is_null($inlandlatestForecastIdE)){
//24HRS now get the parent id from the addInlandForecast table
$addInlandForecastE = InlandForecast::where('publishType', 'Publish-Forecast')->find($inlandlatestForecastIdE);
$inlandwindE =   $addInlandForecastE->inlandevening_table_values()->where('districts', $selectedCity)->value('wind');
$inlandweatherE =  $addInlandForecastE->inlandevening_table_values()->where('districts', $selectedCity)->value('weather');
$inlandwinddirE = $this->endsWith($inlandwindE);
}else{
$addInlandForecastE = 'null';
$inlandwindE =   'null';
$inlandweatherE =  'null';
$inlandwinddirE = 'null';
}
}






// =======================================end of  INLAND FORECAST ===================


    return   view('welcome', ['districts' => $districts, 
    'districts' => $districts, 
    'inlanddistricts' => $inlanddistricts,
    'time' => $this->time,
    'addInlandForecast' => $addInlandForecast,
    'addDailyForecast' => $addDailyForecast,
    'inlandcurrentConditionminTemps' => $this->inlandcurrentConditionminTemp,
    'inlandcurrentConditionmaxTemps' => $this->inlandcurrentConditionmaxTemp,
    'currentConditionItd' =>$this->currentConditionItd,
    'currentConditionRH' => $this->currentConditionRH,
    'currentConditionRain' => $this->currentConditionRain,
    'minTemp' => $this->minTemp,
    'maxTemp' => $this->maxTemp,
    'inlandwind' => strtoupper($this->inlandwind), 
    'wind' => strtoupper($this->wind), 
    'inlanddistrict' =>  $this->inlanddistrict,
    'district' =>  $this->district,
    'inlandweather' => $this->inlandweather,
    'weather' => $this->weather,
    'inlandwinddir' => $this->inlandwinddir,
    'winddir' => $this->winddir,
    'inlandperiod' => $this->inlandperiod,
    'period' => $this->period,
    'inlandpolygons' => $this->inlandpolygons,
    'polygon' => $this->polygons,
    'inlandmarkers' => $this->inlandmarkers,
    'markers' => $this->markers,
    'inlandweatherM' => $inlandweatherM,
    'weatherM' => $weatherM,
    'minTempM' => $minTempM,
    'maxTempM' => $maxTempM,
    'inlandwindM' => $inlandwindM,
    'windM' => $windM,
    'inlandwinddirM' => $inlandwinddirM,
    'winddirM' => $winddirM,
    'inlandweatherA' => $inlandweatherA,
    'weatherA' => $weatherA,
    'minTempA' => $minTempA,
    'maxTempA' => $maxTempA,
    'inlandwindA' => $inlandwindA,
    'windA' => $windA,
    'inlandwinddirA' => $inlandwinddirA,
    'winddirA' => $winddirA,
    'inlandweatherE' => $inlandweatherE,
    'weatherE' => $weatherE,
    'minTempE' => $minTempE,
    'maxTempE' => $maxTempE,
    'inlandwindE' => $inlandwindE,
    'windE' => $windE,
    'inlandwinddirE' => $inlandwinddirE,
    'winddirE' => $winddirE,
    'inlandeachDistrictWeather' =>$this->inlandeachDistrictWeather,
    'eachDistrictWeathers' =>$this->eachDistrictWeather,
    'fivedayforecasts' => $this->fivedayforecast,
    'spatialRainfallImage'=> $this->spatialRainfallImage,
    'spatialTempImage'=> $this->spatialTempImage,
    'marinedata' => $this->marinedata,
    'marinepolygons' => $this->marinepolygons,
    'marinemarkers' =>  $this->marinemarkers,
    'timeOfDay' => $this->timeOfDay(),
    'seasonalForecasts' => $this->seasonalForecast
]);

} catch (\Throwable $th) {
    Log::info($th);
}

}










}
