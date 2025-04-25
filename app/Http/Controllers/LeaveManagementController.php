<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeaveManagementController extends Controller
{

       public function index(){
       return view('content.corehuman.Leavemanagement-view');
   }

}
