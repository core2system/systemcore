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
        Schema::create('core2_contract', function (Blueprint $table) {
         $table->id('contract_id');
         $table->string('employee_id')->nullable();
         $table->string('client_id')->nullable();
         $table->string('contract_file')->nullable();
         $table->string('date')->nullable();
         $table->string('status')->nullable();
         $table->string('date_hired')->nullable();
         $table->timestamps();
  //
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
