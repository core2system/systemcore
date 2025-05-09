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
       Schema::create('core2_client_account', function (Blueprint $table) {
           $table->string('client_id')->nullable();
            $table->primary(['client_id']);
         $table->string('firstname')->nullable();
         $table->string('middlename')->nullable();
         $table->string('lastname')->nullable();
         $table->string('company')->nullable();
         $table->string('contact')->nullable();
         $table->string('email')->nullable();
         $table->string('company_address')->nullable();
         $table->string('status')->nullable();
         $table->string('image')->nullable();
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
