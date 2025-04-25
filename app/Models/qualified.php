<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class qualified extends Model
{
    use HasFactory;

     protected $table="core2_applicant_qualified";

    use HasFactory;
      protected $fillable = [
        'qualified_id',
        'applicant_id',
        'recruitement_id',
        'status',
        'trainee_fee',
    
        
    ];
}
