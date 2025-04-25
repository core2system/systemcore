<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;
use App\Models\contract;
use Illuminate\Http\Request;
class applicantinfoController extends Controller
{

 public function  index(){
  $pageConfigs = ['myLayout' => 'blank'];
  return view('content.applicant.applicant-info',['pageConfigs' => $pageConfigs]);
}

public  function applicant(Request $request){
  $get=$request->getid;
  $getdata = DB::select("select  * from  core1_applicant where  applicant_id='$get' ");
  $pageConfigs = ['myLayout' => 'blank'];
  return view('content.applicant.applicant-info',['pageConfigs' => $pageConfigs],['getdata' =>$getdata]);
}
public function  selectcandidate(Request $request){
  $date = new DateTime('now', new DateTimeZone('Asia/Manila'));
  $Date=$date->format('Y-m-d h:i:s');
  contract::create([
    'client_id' => $request->client_id,
    'employee_id' => $request->applicant_id,
    'status' =>'Pending',
    'date' => $Date,
  ]);
  $get=$request->applicant_id;
  $getdata = DB::select("select   *  from  core1_applicant where  applicant_id='$get' ");
  $pageConfigs = ['myLayout' => 'blank'];
  return view('content.applicant.applicant-info',['pageConfigs' => $pageConfigs],['getdata' =>$getdata]);
}


}
