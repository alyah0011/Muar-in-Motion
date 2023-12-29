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
        Schema::create('acco_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('acco_id');
            $table->unsignedBigInteger('user_id'); // Foreign key referencing users table
            // $table->foreign('att_id')->references('att_id')->on('attractions')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('rev_rating');
            $table->text('rev_comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acco_reviews');
    }
};
