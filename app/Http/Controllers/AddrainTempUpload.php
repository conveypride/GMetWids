<?php

namespace App\Http\Controllers;

use App\Models\AddrainTempUpload as ModelsAddrainTempUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Storage;
class AddrainTempUpload extends Controller
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
    $imagesRainTemp = ModelsAddrainTempUpload::orderBy('created_at', 'desc')
    ->get();
    // dd($imagesRainTemp);
    return view('admin.rainTempUpload', ['imagesRainTemp' => $imagesRainTemp]);
    }


  public function addImgView()
    {
    //   
    return view('admin.addRainTempUpload');
    }

    public function create(Request $request)
    {
    // 
    //  rainfaill image upload
   $randomId  = $this->generateRandomId();
   $image1 = $request->file('image1');
   $image2 = $request->file('image2');
   $image3 = $request->file('image3');
   $image4 = $request->file('image4');
   $image5 = $request->file('image5');

if(!empty($image1)){
    $image = new ModelsAddrainTempUpload();
    $imageName = time() . '_' . $image1->getClientOriginalName();
   $path = $image1->storePubliclyAs('/public/rainimages', $imageName);
   $image->url = $path;
   $image->filename =  $imageName;
   $image->forecaster =   Auth::user()->name;
   $image->imagId = $randomId;
   $image->imageType = 'rain';
   $image->save(); 
// Log::info('Your log message', ['image1' =>  $image1], $imageName);
}
 
if(!empty($image2)){
    $image = new ModelsAddrainTempUpload();
    $imageName = time() . '_' . $image2->getClientOriginalName();
   $path = $image2->storePubliclyAs('/public/rainimages', $imageName);
   $image->url = $path;
   $image->filename =  $imageName;
   $image->forecaster =   Auth::user()->name;
   $image->imagId = $randomId;
   $image->imageType = 'rain';
   $image->save(); 
// Log::info('Your log message', ['image2' =>  $image2]);
}

if(!empty($image3)){
    $image = new ModelsAddrainTempUpload();
    $imageName = time() . '_' . $image3->getClientOriginalName();
   $path = $image3->storePubliclyAs('/public/rainimages', $imageName);
   $image->url = $path;
   $image->filename =  $imageName;
   $image->forecaster =   Auth::user()->name;
   $image->imagId = $randomId;
   $image->imageType = 'rain';
   $image->save(); 
// Log::info('Your log message', ['image3' =>  $image3]);
}

if(!empty($image4)){
    $image = new ModelsAddrainTempUpload();
    $imageName = time() . '_' . $image4->getClientOriginalName();
   $path = $image4->storePubliclyAs('/public/rainimages', $imageName);
   $image->url = $path;
   $image->filename =  $imageName;
   $image->forecaster =   Auth::user()->name;
   $image->imagId = $randomId;
   $image->imageType = 'rain';
   $image->save(); 
// Log::info('Your log message', ['image4' =>  $image4]);
}

if(!empty($image5)){
    $image = new ModelsAddrainTempUpload();
    $imageName = time() . '_' . $image5->getClientOriginalName();
   $path = $image5->storePubliclyAs('/public/rainimages', $imageName);
   $image->url = $path;
   $image->filename =  $imageName;
   $image->forecaster =   Auth::user()->name;
   $image->imagId = $randomId;
   $image->imageType = 'rain';
   $image->save(); 
// Log::info('Your log message', ['image5' =>  $image5]);
}

// temperature image upload
$imageT1 = $request->file('imageT1');
$imageT2 = $request->file('imageT2');
$imageT3 = $request->file('imageT3');
$imageT4 = $request->file('imageT4');
$imageT5 = $request->file('imageT5');
// TEMPERATURE IMAGE UPLOAD
if(!empty($imageT1)){
    $image = new ModelsAddrainTempUpload();
    $imageName = time() . '_' . $imageT1->getClientOriginalName();
   $path = $image1->storePubliclyAs('/public/tempimages', $imageName);
   $image->url = $path;
   $image->filename =  $imageName;
   $image->forecaster =   Auth::user()->name;
   $image->imagId = $randomId;
   $image->imageType = 'temp';
   $image->save(); 
// Log::info('Your log message', ['image1' =>  $image1], $imageName);
}
 
if(!empty($imageT2)){
    $image = new ModelsAddrainTempUpload();
    $imageName = time() . '_' . $imageT2->getClientOriginalName();
   $path = $image2->storePubliclyAs('/public/tempimages', $imageName);
   $image->url = $path;
   $image->filename =  $imageName;
   $image->forecaster =   Auth::user()->name;
   $image->imagId = $randomId;
   $image->imageType = 'temp';
   $image->save(); 
// Log::info('Your log message', ['image2' =>  $image2]);
}

if(!empty($imageT3)){
    $image = new ModelsAddrainTempUpload();
    $imageName = time() . '_' . $imageT3->getClientOriginalName();
   $path = $image3->storePubliclyAs('/public/tempimages', $imageName);
   $image->url = $path;
   $image->filename =  $imageName;
   $image->forecaster =   Auth::user()->name;
   $image->imagId = $randomId;
   $image->imageType = 'temp';
   $image->save(); 
// Log::info('Your log message', ['image3' =>  $image3]);
}

if(!empty($imageT4)){
    $image = new ModelsAddrainTempUpload();
    $imageName = time() . '_' . $imageT4->getClientOriginalName();
   $path = $image4->storePubliclyAs('/public/tempimages', $imageName);
   $image->url = $path;
   $image->filename =  $imageName;
   $image->forecaster =   Auth::user()->name;
   $image->imagId = $randomId;
   $image->imageType = 'temp';
   $image->save(); 
// Log::info('Your log message', ['image4' =>  $image4]);
}

if(!empty($imageT5)){
    $image = new ModelsAddrainTempUpload();
    $imageName = time() . '_' . $imageT5->getClientOriginalName();
   $path = $image5->storePubliclyAs('/public/tempimages', $imageName);
   $image->url = $path;
   $image->filename =  $imageName;
   $image->forecaster =   Auth::user()->name;
   $image->imagId = $randomId;
   $image->imageType = 'temp';
   $image->save(); 
// Log::info('Your log message', ['image5' =>  $image5]);
}


    return redirect()->route('rainTempUpload');
    }

}
