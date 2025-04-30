<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class EmployeeprofileController extends Controller
{



     public  function  index(){

         $id=Auth::user()->code_id;

         $profiles = DB::select("SELECT * FROM users INNER JOIN core1_applicant on core1_applicant.applicant_code=users.code_id where users.code_id='$id' and users.role='Employee'");

         $pageConfigs = ['myLayout' => 'blank'];
         return view('content.employee.employee-profile-view',['profiles' => $profiles],['pageConfigs' =>$pageConfigs]);
    }



//Store image
    public function storeImage(Request $request){

       if($request->file('image')){
        $file= $request->file('image');
        $filename=$file->getClientOriginalName();
        $file-> move(public_path('assets\img'), $filename);
        $data['image']= $filename;
        $get=$_FILES["image"]["name"];
        $id=$request->applicant_id;

        $profiles = DB::select("UPDATE `core1_applicant` set  image='$get' where applicant_code='$id' ");
        return back();
   }
  }
}

