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
        Schema::create('relates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id'); // Foreign key to jobs table
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relates');
    }
};
