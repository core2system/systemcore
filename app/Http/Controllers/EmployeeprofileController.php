<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeprofileController extends Controller
{
 
       public function index(){
       return view('content.corehuman.Employeeprofile-view');
   }
}
