<?php

namespace App\Http\Controllers;

use App\Models\User;
// use PDF;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View; 
ini_set('max_execution_time', 1800); 
class PDFController extends Controller
{
    //
    
    public $pdf;
    public  $data;
    
    public function generatePDF()
    {
        // $users = User::get();
  
        // $this->data = [
        //     'title' => 'Welcome to LaravelTuts.com',
        //     'date' => date('m/d/Y'),
        //     'users' => $users
        // ]; 
          
        // // dd($this->data);
        // // PDF::set_option('isRemoteEnabled', true );
        // $this->pdf = PDF::loadView('admin.cafoMorningTemplate_Forecast',['data' => $this->data] );
     
        // return $this->pdf->download('Morning_Forecast.pdf');

      // Assume $svg contains the SVG content as a string
// $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"><circle cx="50" cy="50" r="40" fill="red" /></svg>';

// // Generate the PDF using Dompdf
// $dompdf = new Dompdf();
// $html = '<img src="data:image/svg+xml;base64,' . base64_encode($svg) . '" />';
// $dompdf->loadHtmlFile('admin.cafoMorningTemplate_Forecast');
// $dompdf->setPaper('A4', 'portrait');
// $dompdf->render();

// // Output the generated PDF as a response or save it to a file
// return $dompdf->stream('svg_example.pdf'); 
// Get the absolute path to the image file
$imagePathcoatofarmsofGhana = public_path('images/Coat_of_arms_of_Ghana.png');
$imagePathgmet = public_path('images/gmet.png');
$imagePathtwitter = public_path('images/twitter.jpg');
$imagePathfacebook = public_path('images/facebook_icon.png');
// Get the image data as a base64-encoded string
$coatofarmsofGhana = base64_encode(file_get_contents($imagePathcoatofarmsofGhana)); 
$gmet = base64_encode(file_get_contents($imagePathgmet)); 
$twitter = base64_encode(file_get_contents($imagePathtwitter)); 
$facebook = base64_encode(file_get_contents($imagePathfacebook)); 

// Render the Blade file to HTML
$html = View::make('admin.cafoMorningTemplate_Forecast',[
    'coatofarmsofGhana' => $coatofarmsofGhana,
'gmet' => $gmet,
'twitter' => $twitter,
'facebook' => $facebook
])->render();

// Generate the PDF using Dompdf
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Output the generated PDF as a response or save it to a file
return $dompdf->stream('pdf_example.pdf');
    }
}
