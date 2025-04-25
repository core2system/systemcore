<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payroll extends Model
{
    use HasFactory;
     protected $table="core2_payroll";
      protected $fillable = [
        'employee_id',
        'recruitement_id',
        'sss',
        'pagibig',
        'philhealth',
        'total_hrs',
        'date',
        'status',
        'total_deduction',
        'net_pay',
        'rate',
        'payroll_id',

        
    ];
}
