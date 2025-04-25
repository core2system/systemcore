<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recruite;


class RecruitmentController extends Controller
{

       
          public function index(){
             $Recruite = Recruite::all(); 
       return view('content.recruitment.recruitment-view',['Recruite' => $Recruite]);
   }



    public function store(Request $request){
        // dd($request->all());
        Recruite::create([
            'jobrole' => $request->jobrole,
            'department' => $request->department,]);
            return back();
    }



public function Recruiteupdate(Request $request){
$id=$request->recruitment_id_insert;
 $Recruite_update = Recruite::where('recruitment_id',$id);
        if(!$Recruite_update){
               return abort(404);
             }
        $Recruite_update->update([
            'status' => $request->status_insert,
        ]);
    return back();
    }



public function update_request(Request $request){
$id=$request->recruitment_id_update;
 $Recruite_updates = Recruite::where('recruitment_id',$id);
        if(!$Recruite_updates){
               return abort(404);
             }
        $Recruite_updates->update([
            'jobrole' => $request->jobrole_update,
                 'department' => $request->department_update,]);
    return back();
    }



}






