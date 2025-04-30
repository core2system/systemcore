<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\payroll;
use DateTime;
use DateTimeZone;

class payrollController extends Controller
{
    public function index()
    {
   $payroll = DB::select("SELECT *,core2_payroll.status as  sta FROM `core2_payroll` INNER JOIN core1_applicant on core1_applicant.applicant_code=core2_payroll.employee_id INNER JOIN core1_recruitment on core1_recruitment.recruitment_id=core2_payroll.recruitement_id");

     return view('content.payroll.payroll-view',['payroll'=>$payroll]);
 }

 public function createpayroll(Request $request){
    $rate=$request->basic_rate;
    $total=$rate/26;
    $rand=round($total);
    $rating=$rand/8;
    $hrs=$request->total_hrs;
    $totalhrs=$rating*$hrs;
    $a=$request->pagibig;
    $b=$request->philhealth;
    $c=$request->sss;
    $total_deduction=$a+$b+$c;
    $date = new DateTime('now', new DateTimeZone('Asia/Manila'));
    $Date=$date->format('Y-m-d h:i:s');

    payroll::create([
    
        'employee_id'=>$request->empid,
        'recruitement_id'=>$request->rec_id,
        'sss'=>$request->sss,
        'pagibig'=>$request->pagibig,
        'philhealth'=>$request->philhealth,
        'total_hrs'=>$request->total_hrs,
        'total_deduction'=>$total_deduction,
        'date'=>$Date,
        'status'=>'Pending',
        'rate'=>$rating,
        'net_pay'=>$totalhrs,
    
    ]);
    
return back();

}

public function paid(Request $request){

    $id=$request->payroll_id;
    $app = payroll::where('payroll_id',$id);
        $app->update([
            'status' =>'Paid',
        ]);
    if(!$app){
     return abort(404); 
}

return back();

}


}
