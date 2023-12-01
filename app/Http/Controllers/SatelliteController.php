<?php

namespace App\Http\Controllers;
use App\Models\Satellite;
use Illuminate\Http\Request;

class SatelliteController extends Controller
{
    //
    public function index()
    {
    //   
    $satelliteforecast = Satellite::latest()->orderByDesc('id')->paginate(16);
    
    return view('satellite',compact('satelliteforecast'));
    }


 public function satelliteforecast()
    {
    //   
    $satelliteforecast = Satellite::latest()->orderByDesc('id')->paginate(16);
    
    return view('admin.satelliteforecast',compact('satelliteforecast'));

    }

    
  public function addSatelliteImgView()
  { 
  //    
  return view('admin.addSatelliteImg');
  }


  public function uploadSatelliteImgView(Request $request)
  {
  // 
 
 $image1 = $request->file('image1');
 $image2 = $request->file('image2');
 $image3 = $request->file('image3');
 $image4 = $request->file('image4');
 $image5 = $request->file('image5');
 $image6 = $request->file('image6');
 $image7 = $request->file('image7');
 $image8 = $request->file('image8');

if(isset($image1)){
  $image = new Satellite();
  $imageName = time() . '_' . $image1->getClientOriginalName();
//    $path = $image1->storePubliclyAs('/public/satellite', $imageName);
 $path = $image1->move(public_path('assets/images/satellite'), $imageName);
 $image->url = $path;
  $image->time = '00:00 UTC';
 $image->filename =  $imageName;

 $image->save(); 
// Log::info('Your log message', ['image1' =>  $image1], $imageName);
}

if(!empty($image2)){
  $image = new Satellite();
  $imageName = time() . '_' . $image2->getClientOriginalName();
//    $path = $image2->storePubliclyAs('/public/satellite', $imageName);
$path = $image2->move(public_path('assets/images/satellite'), $imageName);
 $image->url = $path;
 $image->time = '03:00 UTC';
 $image->filename =  $imageName;

 $image->save(); 
// Log::info('Your log message', ['image2' =>  $image2]);
}

if(!empty($image3)){
  $image = new Satellite();
  $imageName = time() . '_' . $image3->getClientOriginalName();
//    $path = $image3->storePubliclyAs('/public/satellite', $imageName);
$path = $image3->move(public_path('assets/images/satellite'), $imageName);
 $image->url = $path;
 $image->time = '06:00 UTC';
 $image->filename =  $imageName;
 
 $image->save(); 
// Log::info('Your log message', ['image3' =>  $image3]);
}

if(!empty($image4)){
  $image = new Satellite();
  $imageName = time() . '_' . $image4->getClientOriginalName();
//    $path = $image4->storePubliclyAs('/public/satellite', $imageName);
$path = $image4->move(public_path('assets/images/satellite'), $imageName);
 $image->url = $path;
 $image->time = '09:00 UTC';
 $image->filename =  $imageName;
 
 $image->save(); 
// Log::info('Your log message', ['image4' =>  $image4]);
}

if(!empty($image5)){
  $image = new Satellite();
  $imageName = time() . '_' . $image5->getClientOriginalName();
//    $path = $image5->storePubliclyAs('/public/satellite', $imageName);
 $path = $image5->move(public_path('assets/images/satellite'), $imageName);
 $image->url = $path;
 $image->time = '12:00 UTC';
 $image->filename =  $imageName;
  
 $image->save(); 
// Log::info('Your log message', ['image5' =>  $image5]);
}
 
if(!empty($image6)){
  $image = new Satellite();
  $imageName = time() . '_' . $image6->getClientOriginalName();
//    $path = $image5->storePubliclyAs('/public/satellite', $imageName);
 $path = $image6->move(public_path('assets/images/satellite'), $imageName);
 $image->url = $path;
 $image->time = '15:00 UTC';
 $image->filename =  $imageName;
  
 $image->save(); 
// Log::info('Your log message', ['image5' =>  $image5]);
}

if(!empty($image7)){
  $image = new Satellite();
  $imageName = time() . '_' . $image7->getClientOriginalName();
//    $path = $image5->storePubliclyAs('/public/satellite', $imageName);
 $path = $image7->move(public_path('assets/images/satellite'), $imageName);
 $image->url = $path;
 $image->time = '18:00 UTC';
 $image->filename =  $imageName;
  
 $image->save(); 
// Log::info('Your log message', ['image5' =>  $image5]);
}

if(!empty($image8)){
  $image = new Satellite();
  $imageName = time() . '_' . $image8->getClientOriginalName();
//    $path = $image5->storePubliclyAs('/public/satellite', $imageName);
 $path = $image8->move(public_path('assets/images/satellite'), $imageName);
 $image->url = $path;
 $image->time = '21:00 UTC';
 $image->filename =  $imageName;
  
 $image->save(); 
// Log::info('Your log message', ['image5' =>  $image5]);
}


  return redirect()->route('satelliteforecast');
  }


  public function uploadSatelliteImgViewEdit(Request $request)
  {
  // 
 
 $image1 = $request->file('image');
 $imageid = $request->input('imageid');

if(isset($image1)){
  $image = new Satellite();
  $imageName = time() . '_' . $image1->getClientOriginalName();
//    $path = $image1->storePubliclyAs('/public/satellite', $imageName);
 $path = $image1->move(public_path('assets/images/satellite'), $imageName); 
 
 Satellite::where('id',$imageid)->update(
  [
      'url' =>   $path,
      'filename' =>   $imageName,

  ]

);


}
 


  return redirect()->route('satelliteforecast');
  }




}
