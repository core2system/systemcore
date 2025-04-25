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
     Schema::create('core2_applicant_qualified', function (Blueprint $table) {
         $table->id('qualified_id');
         $table->string('applicant_id')->nullable();
         $table->string('recruitement_id')->nullable();
         $table->string('trainee_fee')->nullable();
         $table->string('status')->nullable();
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
