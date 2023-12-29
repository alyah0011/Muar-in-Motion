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
        Schema::create('attractions', function (Blueprint $table) {
            $table->id('att_id'); // Attraction unique code
            $table->string('att_img', 255)->nullable(); // Attraction image file name
            $table->string('att_cat', 20);
            $table->string('att_name', 30);
            $table->string('att_sdesc', 200);
            $table->string('att_ldesc', 2000);
            $table->string('att_website', 100)->nullable();
            $table->string('att_contact', 20)->nullable();
            $table->double('att_lat');
            $table->double('att_longi');
            $table->decimal('average_rating', 3, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attractions');
    }
};
