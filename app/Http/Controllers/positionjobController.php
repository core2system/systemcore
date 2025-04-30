<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

    use Illuminate\Support\Facades\DB;

class positionjobController extends Controller
{
 public function  index(){

 
  $post = DB::select("SELECT *,core2_applicant_qualified.status as st,core1_applicant.image as m FROM `core2_applicant_qualified` inner join core1_applicant on  core1_applicant.applicant_code=core2_applicant_qualified.applicant_id INNER JOIN  core1_recruitment on  core1_recruitment.recruitment_id=core2_applicant_qualified.recruitement_id  where core2_applicant_qualified.status='Posted' ");
  return view('content.core.position-job-view',['post' => $post]);
}
}
