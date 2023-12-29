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
        Schema::create('accomodations', function (Blueprint $table) {
            $table->id('acco_id');
            $table->string('acco_name');
            $table->string('acco_img', 255)->nullable();
            $table->string('acco_types');
            $table->text('acco_sdesc'); // Short description
            $table->text('acco_ldesc'); // Long description
            $table->string('acco_price_range')->nullable();
            $table->string('acco_website')->nullable();
            $table->string('acco_contact')->nullable();
            $table->double('acco_lat')->nullable();
            $table->double('acco_longi')->nullable();
            $table->decimal('acco_average_rating', 3, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accomodations');
    }
};
