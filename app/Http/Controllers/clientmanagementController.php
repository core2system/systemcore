<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class clientmanagementController extends Controller
{
     


      public function index()
  {

 $client = DB::select("select  * FROM users  INNER JOIN  core2_client_account  on  core2_client_account.client_id=users.code_id ");

      return view('content.core.client-view',['client'=>$client]);


}


}
