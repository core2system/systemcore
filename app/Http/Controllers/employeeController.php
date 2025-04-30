<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class employeeController extends Controller
{


public  function  index(){

  $id=Auth::user()->code_id;

   $emp = DB::select("SELECT *,CONCAT(core2_client_account.firstname,' ',core2_client_account.lastname) as clientname,CONCAT(core1_applicant.firstname,' ',core1_applicant.lastname) as employee, core2_contract.status as sta FROM `core2_contract`  INNER JOIN    core1_applicant ON  core1_applicant.applicant_id=core2_contract.employee_id INNER JOIN  core2_client_account on core2_client_account.client_id=core2_contract.client_id where  core2_client_account.client_id='$id' ");
       $pageConfigs = ['myLayout' => 'blank'];
     return view('content.applicant.employee-info',['pageConfigs' => $pageConfigs],['emp' => $emp]);

}

 public function storefile(Request $request){
  $file = $request->file('contract_file');
  $fileName = time() . '_' . $file->getClientOriginalName();
  $file-> move(public_path('assets\img'),$fileName);
  $id=$request->contract_id;
  DB::select("update core2_contract set contract_file='$fileName' where  contract_id='$id'");
  return redirect()->back()->with('message', 'File uploaded successfully.');
}



}
