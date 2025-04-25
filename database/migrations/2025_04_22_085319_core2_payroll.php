<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::create('core2_payroll', function (Blueprint $table) {
         $table->id('payroll_id');
         $table->string('employee_id')->nullable();
         $table->string('recruitement_id')->nullable();
         $table->string('pagibig')->nullable();
         $table->string('philhealth')->nullable();
         $table->string('sss')->nullable();
         $table->string('total_deduction')->nullable();
         $table->string('total_hrs')->nullable();
         $table->string('date')->nullable();
         $table->string('net_pay')->nullable();
         $table->string('rate')->nullable();
         $table->string('status')->nullable();
         $table->timestamps();
     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
