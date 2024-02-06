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
            $table->id('eve_id'); // Event unique code
            $table->string('eve_img', 255)->nullable(); // Event image file name
            $table->string('eve_name', 30); // Event name
            $table->string('eve_cat', 20)->nullable(); //Additional requirement
            $table->string('eve_sdesc', 200)->nullable(); // Event short description
            $table->string('eve_ldesc', 2000)->nullable(); // Event long description
            $table->date('eve_date'); // Event Date
            $table->string('eve_time', 20); // Event Time
            $table->double('eve_lati', 10, 6)->nullable(); // Latitude (up to 10 digits with 6 decimal places)
            $table->double('eve_longi', 10, 6)->nullable(); // Longitude (up to 10 digits with 6 decimal places)
            $table->string('eve_address', 500); //Additional requirement
            $table->string('eve_contact', 30); // Event contact details
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
