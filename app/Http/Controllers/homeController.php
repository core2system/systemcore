<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class homeController extends Controller
{
 public function index(){

  $post = DB::select("SELECT *,core2_applicant_qualified.status as st FROM `core2_applicant_qualified` inner join core1_applicant on  core1_applicant.applicant_code=core2_applicant_qualified.applicant_id INNER JOIN  core1_recruitment on  core1_recruitment.recruitment_id=core2_applicant_qualified.recruitement_id  where core2_applicant_qualified.status='Post' ");
  $pageConfigs = ['myLayout' => 'blank'];
  return view('content.applicant.home-view',['pageConfigs' => $pageConfigs],['post' => $post]);

}




public function login(Request $request){

// dd('test post', $request->all());

  $user = User::where('email', $request->email)->first();

  // dd($user);

  if(!$user){

    // TODO:
    return back()->with('error', 'user not found');
  }



  if(!Hash::check($request->password, $user->password)){
    return back()->with('error', 'incorrect credential');
  }


  if($user->role=='admin'){
    Auth::login($user);
    return redirect('/dashboard/crm');
  }else{
    Auth::login($user);
    return redirect('/');
  }
}


}
