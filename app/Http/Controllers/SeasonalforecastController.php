<?php

namespace App\Http\Controllers;

use App\Models\Seasonalforecast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeasonalforecastController extends Controller
{
    //

    public  function generateRandomId($length = 10)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $id = '';
    
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $id .= $characters[random_int(0, $max)];
        }
    
        return $id;
    }

    public function index()
    {
    //   
    $seasonalForecast = Seasonalforecast::orderBy('created_at', 'desc')
    ->get(); 
    return view('admin.seasonalforecast', ['seasonalForecasts' => $seasonalForecast]);
    }


  public function seasonaladd()
    {
    //   
    return view('admin.seasonalforecastUpload');
    }

    public function create(Request $request)
    {
    // 
    //  rainfaill image upload
   $randomId  = $this->generateRandomId();
   $sumarry = $request->input('summary');
   $datestart = $request->input('datestart');
   $dateend = $request->input('dateend'); 
   $pdf = $request->file('pdffile');
   $image1 = $request->file('image1');
   $image2 = $request->file('image2');
   $image3 = $request->file('image3');
   $image4 = $request->file('image4');
// image 1
if(!empty($pdf)){
    $pdfname = time() . '_' . $pdf->getClientOriginalName();
    $pdfpath = $pdf->storePubliclyAs('/public/seasonalForecastPDF', $pdfname);
    $pdfurl = $pdfpath;
    $pdffilename = $pdfname;
 }

// image 1
if(!empty($image1)){
   $imageName1 = time() . '_' . $image1->getClientOriginalName();
   $path1 = $image1->storePubliclyAs('/public/seasonalForecastImages', $imageName1);
   $image1url = $path1;
   $image1filename = $imageName1;
}

// image 2
if(!empty($image2)){
    $imageName2 = time() . '_' . $image2->getClientOriginalName();
    $path2 = $image2->storePubliclyAs('/public/seasonalForecastImages', $imageName2);
    $image2url = $path2;
    $image2filename = $imageName2;
 }

 // image 3
if(!empty($image3)){
    $imageName3 = time() . '_' . $image3->getClientOriginalName();
    $path3 = $image3->storePubliclyAs('/public/seasonalForecastImages', $imageName3);
    $image3url = $path3;
    $image3filename = $imageName3;
 }


 // image 4
 if(!empty($image4)){
    $imageName4 = time() . '_' . $image4->getClientOriginalName();
    $path4 = $image4->storePubliclyAs('/public/seasonalForecastImages', $imageName4);
    $image4url = $path4;
    $image4filename = $imageName4;
 }

 $seasonalForecastdb = new Seasonalforecast();
            $seasonalForecastdb->seasonalId = $randomId;
            if(!empty($image1)){
                $seasonalForecastdb->filename1 = $image1url;
            }
            if(!empty($image1filename)){
                $seasonalForecastdb->url1 = $image1filename;
            }
            if(!empty($image2)){
                $seasonalForecastdb->filename2 = $image2url;
            }
            if(!empty($image2filename)){
                $seasonalForecastdb->url2 = $image2filename;
            }
            if(!empty($image3)){
                $seasonalForecastdb->filename3 = $image3url;
            }
            if(!empty($image3filename)){
                $seasonalForecastdb->url3 = $image3filename;
            }
            if(!empty($image4)){
                $seasonalForecastdb->filename4 = $image4url;
            }
            if(!empty($image4filename)){
                $seasonalForecastdb->url4 = $image4filename;
            }
            if(!empty($pdf)){
                $seasonalForecastdb->pdfurl = $pdfurl;
                $seasonalForecastdb->pdfname = $pdffilename;
            }
           

             $seasonalForecastdb->summary = $sumarry;
             $seasonalForecastdb->datestart = $datestart;
             $seasonalForecastdb->dateend = $dateend;
             $seasonalForecastdb->forecaster  =Auth::user()->name;
            $seasonalForecastdb->save();

 


    return redirect()->route('seasonalforecast');
    }




}
