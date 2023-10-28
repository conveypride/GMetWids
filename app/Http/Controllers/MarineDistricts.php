<?php

namespace App\Http\Controllers;

use App\Models\MarineDistricts as ModelsMarineDistricts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class MarineDistricts extends Controller
{
    //

    public function index()
    {
        $districts = DB::table('marine_districts')->orderBy('districtname')->get();
    return view('admin.marineDistricts', ['districts' => $districts]);
    }


    public function create(Request $request)
    {
// insert a new record
ModelsMarineDistricts::create([
    'districtname' =>  Str::upper($request->get('districtname')) ,
    'districtZone' =>   Str::upper($request->get('districtZone')),
    'user' => Auth::user()->name
]);
  return response('Success');
     }


// ===========================
     public function delete(Request $request)
     {
        $id = $request->get('districtid');
        ModelsMarineDistricts::where('id',$id)->delete();
  return response('Success');
      }



}
