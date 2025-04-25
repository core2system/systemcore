<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class transactionController extends Controller
{
     public function index()
    {
   $payroll = DB::select("SELECT *,core2_payroll.status as  sta FROM `core2_payroll` INNER JOIN core1_applicant on core1_applicant.applicant_code=core2_payroll.employee_id INNER JOIN core1_recruitment on core1_recruitment.recruitment_id=core2_payroll.recruitement_id where core2_payroll.status='Paid' ");

     return view('content.payroll.history-view',['payroll'=>$payroll]);
 }
}
