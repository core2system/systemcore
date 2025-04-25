<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\signup;
use DateTime;
use DateTimeZone;
class signupController extends Controller
{

public function index(){
    $pageConfigs = ['myLayout' => 'blank'];
        return view('content.applicant.signup-view',['pageConfigs' => $pageConfigs]);
      }

public function store(Request $request){
      // dd($request->all());

     $date = new DateTime('now', new DateTimeZone('Asia/Manila'));
$Date=$date->format('Ymdhis');
      signup::create([
          'client_id' => $Date,
          'firstname' => $request->first,
          'middlename' => $request->middle,
          'lastname' => $request->last,
          'address' => $request->address,
          'contact' => $request->contact,
          'email' => $request->email,
          'company' => $request->company,
          'company_address' => $request->address,
      ]);
      $gg=$request->first;
        User::create([
          'name' =>$request->first,
          'code_id' =>$Date,
          'password' =>$request->password,
          'email' => $request->email,
           'role'=>'client',
      ]);
        return redirect()->back()->with('alert', 'SUCCESS REGISTER');
  }

}
