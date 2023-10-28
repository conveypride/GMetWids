<?php

namespace App\Http\Controllers; 
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class AddnewuserController extends Controller
{
    //

public function addnewuser(Request $request) {
    if(Auth::user()->usertype == 0){
        $users = User::get();

    }elseif(Auth::user()->usertype == 1 && Auth::user()->department == 'CAFO' ) {
        $users = User::where('department', 'CAFO')->get();
    }elseif(Auth::user()->usertype == 1 && Auth::user()->department == 'KIAMO' ) {
        $users = User::where('department', 'KIAMO')->get();
    }elseif(Auth::user()->usertype == 1 && Auth::user()->department == 'MARINE' ) {
        $users = User::where('department', 'MARINE')->get();
    }
   


    return view('admin.addnewuserIndex', compact('users'));

}


public function updateuser(Request $request) {
    try {
  
$idd = intval($request->idd);
 
    User::where('id', $idd)->update(
        [
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department,
            'usertype' => intval($request->usertype)
        ]
    );


    return redirect()->route('addnewuser');

} catch (\Throwable $th) {
    //throw $th;
    Log::info($th);
}

}

public function createUser(Request $request) {
    try {
  
 
 
    User::insert(
        [
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department,
            'password' => Hash::make($request->password),
            'usertype' => intval($request->usertype),
            'role' => 1
        ]
    );


    return redirect()->route('addnewuser');

} catch (\Throwable $th) {
    //throw $th;
    Log::info($th);
}

}



}
