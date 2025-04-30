<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class employeesignController extends Controller
{
public function index(){
    $pageConfigs = ['myLayout' => 'blank'];
        return view('content.applicant.employee-sign-view',['pageConfigs' => $pageConfigs]);
      }


public function signemployee(Request $request){
   
    $existingUser = DB::table('users')->where('code_id', $request->employeeid)->first();

    if ($existingUser) {
             User::create([
            'code_id' =>$request->employeeid,
            'password' => bcrypt($request->passwordemployee), // Secure password storage
            'email' => $request->emailemployee,
            'role' => 'Employee',
        ]);
        return redirect()->back()->with('alert', 'SUCCESS REGISTER');
    } else {
        // Ensure `$Date` is properly defined, assuming it's the current timestamp


        // Create new user
          return redirect()->back()->with('alert', 'Employee ID does not exist. Please contact the admin');

    }


}





}




