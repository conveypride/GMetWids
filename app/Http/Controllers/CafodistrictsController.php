<?php

namespace App\Http\Controllers;

use App\Models\Cafodistricts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CafodistrictsController extends Controller
{
    //
    public function index()
    {
        $districts = DB::table('cafodistricts')->orderBy('districtname')->get();
    return view('admin.cafoDistricts', ['districts' => $districts]);
    }


    public function create(Request $request)
    {
// insert a new record
Cafodistricts::create([
    'districtname' => ucwords($request->get('districtname')) ,
    'districtZone' =>  ucwords($request->get('districtZone')),
    'user' => Auth::user()->name
]);
  return response('Success');
     }


// ===========================
     public function delete(Request $request)
     {
        $id = $request->get('districtid');
        Cafodistricts::where('id',$id)->delete();
  return response('Success');
      }



}
