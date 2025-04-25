<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contract extends Model
{
    use HasFactory;


     protected $table="core2_contract";

    use HasFactory;
      protected $fillable = [
        'employee_id',
        'client_id',
        'contract_file',
        'date',
        'contract_id',
        'status',
        
    ];
}
