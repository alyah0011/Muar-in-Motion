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
        Schema::create('events', function (Blueprint $table) {
            $table->id('eve_id'); 
            $table->string('eve_img', 255)->nullable(); 
            $table->string('eve_name', 30); 
            $table->string('eve_sdesc', 200)->nullable(); 
            $table->string('eve_ldesc', 2000)->nullable(); 
            $table->date('eve_date'); 
            $table->string('eve_time', 20); 
            $table->double('eve_lati', 10, 6)->nullable(); 
            $table->double('eve_longi', 10, 6)->nullable(); 
            $table->string('eve_contact', 30); 
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
