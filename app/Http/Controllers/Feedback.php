<?php

namespace App\Http\Controllers;

use App\Models\Feedback as ModelsFeedback;
use Illuminate\Http\Request;

class Feedback extends Controller
{
    //

    public function create(Request $request)
    {
       
 // Handle form submission logic here
 $email = $request->input('email1');
 $phoneNum = $request->input('phoneNum');
 $selectCity = $request->input('selectCity');
 $forecastType = $request->input('forecastType');
 $feedbackaccuracy = $request->input('feedbackaccuracy');
 $feedbackcomment = $request->input('comment');
//  dd([$email, $phoneNum , $selectCity, $forecastType, $feedbackaccuracy,$feedbackcomment ]);
$feedback = new ModelsFeedback();
$feedback->email = $email; 
$feedback->phoneNum = $phoneNum; 
$feedback->selectCity = $selectCity; 
$feedback->forecastType = $forecastType; 
$feedback->feedbackaccuracy = $feedbackaccuracy; 
$feedback->comment = $feedbackcomment; 
$feedback->save();

return redirect('/');


    }

    
}
