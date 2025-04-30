<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class employeecontractController extends Controller
{
    


public  function  index(){

  $id=Auth::user()->code_id;
   $emp = DB::select("SELECT *,CONCAT(core2_client_account.firstname,' ',core2_client_account.lastname) as clientname,CONCAT(core1_applicant.firstname,' ',core1_applicant.lastname) as employee, core2_contract.status as sta,core2_client_account.contact as c FROM `core2_contract`  INNER JOIN    core1_applicant ON  core1_applicant.applicant_id=core2_contract.employee_id INNER JOIN  core2_client_account on core2_client_account.client_id=core2_contract.client_id  where core1_applicant.applicant_code='$id'");
       $pageConfigs = ['myLayout' => 'blank'];
     return view('content.employee.employee-contract-view',['pageConfigs' => $pageConfigs],['emp'=>$emp]);

}
}
