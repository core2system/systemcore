<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;
class clientcontractController extends Controller
{
 public function index()
 {

   $client = DB::select("SELECT *,CONCAT(core2_client_account.firstname,' ',core2_client_account.lastname) as clientname,CONCAT(core1_applicant.firstname,' ',core1_applicant.lastname) as employee, core2_contract.status as sta FROM `core2_contract`  INNER JOIN    core1_applicant ON  core1_applicant.applicant_id=core2_contract.employee_id INNER JOIN  core2_client_account on core2_client_account.client_id=core2_contract.client_id;");

   return view('content.core.client-agreement',['client'=>$client]);

 }

 public function storefile(Request $request){
  $file = $request->file('contract_file');
  $fileName = time() . '_' . $file->getClientOriginalName();
  $file-> move(public_path('assets\img'),$fileName);
  $id=$request->contract_id;
  DB::select("update core2_contract set contract_file='$fileName' where  contract_id='$id'");
  return redirect()->back()->with('message', 'File uploaded successfully.');
}

public function hiredupdate(Request $request){
        // dd($request->all());
  $date = new DateTime('now', new DateTimeZone('Asia/Manila'));
  $Date=$date->format('Y-m-d h:i:s');
  $id=$request->contract_ids;
  DB::select("update core2_contract set status='Hired',date_hired='$Date' where  contract_id='$id'");
  return redirect()->back()->with('message', 'File uploaded successfully.');
}


public function canceledupdate(Request $request){
        // dd($request->all());

  $id=$request->cancel_id;
  DB::select("update core2_contract set status='Cancel',date_hired='' where  contract_id='$id'");
  return redirect()->back()->with('message', 'File uploaded successfully.');
}




}
