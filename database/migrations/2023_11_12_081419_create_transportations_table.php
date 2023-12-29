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
        Schema::create('transportations', function (Blueprint $table) {
            $table->id('trans_id');
            $table->string('trans_name');
            $table->string('trans_img', 255)->nullable();
            $table->string('trans_type');
            $table->text('trans_sdesc'); // Short description
            $table->text('trans_ldesc'); // Long description
            $table->string('trans_website')->nullable();
            // Removed 'trans_contact', 'trans_latitude', 'trans_longitude'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportations');
    }
};
