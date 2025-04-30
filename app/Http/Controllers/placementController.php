<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\applicant;
use Illuminate\Support\Facades\DB;
use App\Models\qualified;

class placementController extends Controller
{
    public function index()
    {

      $applicant = DB::select("SELECT *,core2_applicant_qualified.status as st FROM `core2_applicant_qualified` inner join core1_applicant on  core1_applicant.applicant_code=core2_applicant_qualified.applicant_id INNER JOIN  core1_recruitment on  core1_recruitment.recruitment_id=core2_applicant_qualified.recruitement_id ");
          return view('content.core.placement-view',compact('applicant'));
  }

  public function storeplacement(Request $request){
      qualified::create([
        'applicant_id' =>$request->empid,
        'recruitement_id' =>$request->rec_id,
        'status' =>'Pending',
        'trainee_fee' => $request->fee,
    ]);
      return back();
  }


  public function update(Request $request){
    $id=$request->employee_id;
    $app = qualified::where('qualified_id',$id);
    if(!$app){
     return abort(404);
 }

 $app->update([
    'status' =>'Posted',
]);


 return back();

   }

 }
