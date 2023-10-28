<?php

namespace App\Http\Controllers;

use App\Models\MarineForecast;
use App\Models\MarineMarkers;
use App\Models\MarinePolygons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
class MarineForecastController extends Controller
{

public $marinepolygons;
public $marinemarkers;
public $marinedata;
    //
    public function index()
    {
        $marineforecast = MarineForecast::orderByDesc('created_at')->get();
    
    return view('admin.marineForecast', ['marineforecasts' => $marineforecast]);
    }

 public function addNewMf()
    {
        $districts = DB::table('marine_districts')->orderBy('districtname')->get();
        // dd($districts);
    return view('admin.addNewMarinForecast', ['districts' => $districts]);
    }


 public function editmarineforecastTable($id)
    {
        $marineforecast = DB::table('marine_forecasts')->where('id',$id)->first();
//   $polygons = $marineforecast->marine_polygons();
//   $markers = $marineforecast->marine_markers();
       
        // dd($districts);
    return view('admin.editMarine',compact('marineforecast'));
    }


 public function editmarineTable( Request $request)
    {
        $data = $request->all();
      MarineForecast::where('id',$data['iddd'])->update(
            [
                'validAt' =>  Str::upper( $data['dateCM']),
                'minMaxWaveCurrent' => Str::upper( $data['maxWaveCurrentRange']),
                'seaState' =>  Str::upper( $data['seaState']),
                'surfaceWind24hrsMin' => Str::upper( $data['surfaceWind24hrsMin']),
                'surfaceWind24hrsMax' => Str::upper( $data['surfaceWind24hrsMax']),
                'surfaceWind48hrsMin' => Str::upper( $data['surfaceWind48hrsMin']),
                'surfaceWind48hrsMax' => Str::upper( $data['surfaceWind48hrsMax']),
                'visibility24hrsMin' => Str::upper( $data['visibility24hrsMin']),
                'visibility24hrsMax' => Str::upper( $data['visibility24hrsMax']),
                'visibility48hrsMin' => Str::upper( $data['visibility48hrsMin']),
                'visibility48hrsMax' => Str::upper( $data['visibility48hrsMax']),
                'seaSurfTemp24hrsMin' => Str::upper( $data['seaSurfTemp24hrsMin']),
                'seaSurfTemp24hrsMax' => Str::upper( $data['seaSurfTemp24hrsMax']),
                'seaSurfTemp48hrsMin' => Str::upper( $data['seaSurfTemp48hrsMin']),
                'seaSurfTemp48hrsMax' => Str::upper( $data['seaSurfTemp48hrsMax']),
                'sigWaveHeight24hrsMin' => Str::upper( $data['sigWaveHeight24hrsMin']),
                'sigWaveHeight24hrsMax' => Str::upper( $data['sigWaveHeight24hrsMax']),
                'sigWaveHeight48hrsMin' => Str::upper( $data['sigWaveHeight48hrsMin']),
                'sigWaveHeight48hrsMax' => Str::upper( $data['sigWaveHeight48hrsMax']),
                'tidalwave24hrsMin' => Str::upper( $data['tidalwave24hrsMin']),
                'tidalwave24hrsMax' => Str::upper( $data['tidalwave24hrsMax']),
                'tidalwave48hrsMin' => Str::upper( $data['tidalwave48hrsMin']),
                'tidalwave48hrsMax' => Str::upper( $data['tidalwave48hrsMax']),
                'waveCureent24hrs' => Str::upper( $data['waveCureent24hrs']),
                'waveCureent48hrs' => Str::upper( $data['waveCureent48hrs']),
                'summary' => $data['summaryMarine'],
                ]
        );
         
        
        return  Redirect()->route('mmf');

    }

 public function editmarinemap(Request $request)
    {
        $data = $request->all();
        $ploygons= $data[0]['polygons']['polygons'];
        $marker = $data[0]['markers']['markers'];
        $id  =  $data[0]['id'];
        $date = $data[0]['date'];
try {
    //code...

        if(!empty($ploygons)){
            MarinePolygons::where('marine_forecast_id',$id)->delete();
           
            foreach ($ploygons as $item) {
           $polygons = new MarinePolygons();
           $polygons->marine_forecast_id = $id;
           $polygons->polygonId = $item['id'];
           $polygons->date =  $date;
           $polygons->color = $item['color'];
           $polygons->cordinate = json_encode($item['cordinates']); 
            $polygons->save();
        }
        }

if(!empty($marker)){
// Create a new instance of markers
MarineMarkers::where('marine_forecast_id',$id)->delete();
foreach ($marker as $item) {
$markers = new MarineMarkers();
$markers->marine_forecast_id = $id;
$markers->markersId = $item['id'];
$markers->date = $date;
$markers->icontype = $item['icontype'];
$markers->lng = $item['lnglat']['lng'];
$markers->lat = $item['lnglat']['lat'];
$markers->save();

}}
} catch (\Throwable $th) {
    //throw $th;
    Log::info($th);
}

return response('Done');

    }
    public function create(Request $request)
    {
        // $randomId  = $this->generateRandomId();
        $data = $request->all();

Log::info("message",$data);
$ploygons= $data[0]['polygons']['polygons'];
 $marker = $data[0]['markers']['markers'];
$date = $data[0]['dateWaveCurrent'][0];


$add_marine_forecasts = new MarineForecast();

            $add_marine_forecasts->creator =  Auth::user()->name;
            $add_marine_forecasts->publishType= Str::upper( $data[0]['publishType']);
            $add_marine_forecasts->validAt=  Str::upper( $data[0]['dateWaveCurrent'][0]);
            $add_marine_forecasts->minMaxWaveCurrent= Str::upper( $data[0]['dateWaveCurrent'][1]);
            $add_marine_forecasts->seaState=  Str::upper( $data[0]['dateWaveCurrent'][2]);
            $add_marine_forecasts->surfaceWind24hrsMin= Str::upper( $data[0]['tableValues']['surfaceWind24hrsMin']);
            $add_marine_forecasts->surfaceWind24hrsMax=Str::upper( $data[0]['tableValues']['surfaceWind24hrsMax']);
            $add_marine_forecasts->surfaceWind48hrsMin= Str::upper( $data[0]['tableValues']['surfaceWind48hrsMin']);
            $add_marine_forecasts->surfaceWind48hrsMax= Str::upper( $data[0]['tableValues']['surfaceWind48hrsMax']);
            $add_marine_forecasts->visibility24hrsMin=Str::upper( $data[0]['tableValues']['visibility24hrsMin']);
            $add_marine_forecasts->visibility24hrsMax = Str::upper( $data[0]['tableValues']['visibility24hrsMax']);
            $add_marine_forecasts->visibility48hrsMin=Str::upper( $data[0]['tableValues']['visibility48hrsMin']);
            $add_marine_forecasts->visibility48hrsMax= Str::upper( $data[0]['tableValues']['visibility48hrsMax']);
            $add_marine_forecasts->seaSurfTemp24hrsMin =Str::upper( $data[0]['tableValues']['seaSurfTemp24hrsMin']);
            $add_marine_forecasts->seaSurfTemp24hrsMax = Str::upper( $data[0]['tableValues']['seaSurfTemp24hrsMax']);
            $add_marine_forecasts->seaSurfTemp48hrsMin= Str::upper( $data[0]['tableValues']['seaSurfTemp48hrsMin']);
            $add_marine_forecasts->seaSurfTemp48hrsMax= Str::upper( $data[0]['tableValues']['seaSurfTemp48hrsMax']);
            $add_marine_forecasts->sigWaveHeight24hrsMin = Str::upper( $data[0]['tableValues']['sigWaveHeight24hrsMin']);
            $add_marine_forecasts->sigWaveHeight24hrsMax = Str::upper( $data[0]['tableValues']['sigWaveHeight24hrsMax']);
            $add_marine_forecasts->sigWaveHeight48hrsMin = Str::upper( $data[0]['tableValues']['sigWaveHeight48hrsMin']);
            $add_marine_forecasts->sigWaveHeight48hrsMax= Str::upper( $data[0]['tableValues']['sigWaveHeight48hrsMax']);
            $add_marine_forecasts->tidalwave24hrsMin = Str::upper( $data[0]['tableValues']['tidalwave24hrsMin']);
            $add_marine_forecasts->tidalwave24hrsMax = Str::upper( $data[0]['tableValues']['tidalwave24hrsMax']);
            $add_marine_forecasts->tidalwave48hrsMin= Str::upper( $data[0]['tableValues']['tidalwave48hrsMin']);
            $add_marine_forecasts->tidalwave48hrsMax= Str::upper( $data[0]['tableValues']['tidalwave48hrsMax']);
            $add_marine_forecasts->waveCureent24hrs= Str::upper( $data[0]['tableValues']['waveCureent24hrs']);
            $add_marine_forecasts->waveCureent48hrs= Str::upper( $data[0]['tableValues']['waveCureent48hrs']);
            $add_marine_forecasts->summary= ucfirst($data[0]['summary']);
            $add_marine_forecasts->textareaweatherwarning = 'null';
            $add_marine_forecasts->warningtype= 'null';
              $add_marine_forecasts->save();

              if(!empty($ploygons)){
                foreach ($ploygons as $item) {
               $polygons = new MarinePolygons();
               $polygons->polygonId = $item['id'];
               $polygons->date =  $date;
               $polygons->color = $item['color'];
               $polygons->cordinate = json_encode($item['cordinates']); 
               $add_marine_forecasts->marine_polygons()->save($polygons);
            }
            }

  if(!empty($marker)){
// Create a new instance of markers
foreach ($marker as $item) {
    $markers = new MarineMarkers();
    $markers->markersId = $item['id'];
    $markers->date = $date;
    $markers->icontype = $item['icontype'];
    $markers->lng = $item['lnglat']['lng'];
    $markers->lat = $item['lnglat']['lat'];
    $add_marine_forecasts->marine_markers()->save($markers);
    
 }
    }
            
            return response('Form submitted successfully', 200);
         
    }

    public function viewmarineforecast($id)
    {
        
        $marineforecast =  MarineForecast::where('id', $id)->first();

        // $morning = $dailyforecast->morning_table_values()->get();
        // $afternoon = $dailyforecast->afternoon_table_values()->get();
        // $evening =  $dailyforecast->evening_table_values()->get(); 
        // $time = $this->getTimeOfDay($dailyforecast->created_at);

    return view('admin.marineTableTemplate',compact('marineforecast'));
    }


    public function viewmarineforecastMap($id){
        $marineForecast =  MarineForecast::where('id', $id)->first();
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


        return view('admin.marineMapForecastTemplate',[
     'marinedata' => $this->marinedata,
    'marinepolygons' => $this->marinepolygons,
    'marinemarkers' =>  $this->marinemarkers
        ]);

    }





    
}
