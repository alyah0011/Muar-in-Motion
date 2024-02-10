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
        Schema::create('local_products', function (Blueprint $table) {
            $table->id('lp_id');
            $table->string('lp_name');
            $table->string('lp_img', 255)->nullable();
            $table->string('lp_type');
            $table->text('lp_sdesc'); // Short description
            $table->text('lp_ldesc'); // Long description
            $table->string('lp_price')->nullable();
            $table->double('lp_lat');
            $table->double('lp_longi');
            $table->string('lp_address', 500);
            $table->string('lp_contact', 20)->nullable();
            $table->string('lp_website')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('local_products');
    }
};
