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
        Schema::create('enrolls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studentid')->unique();
            $table->unsignedBigInteger('subject_id');
            $table->string('subject_code');
            $table->string('subject_name');            
            $table->string('subject_time');
            $table->string('subject_room');
            $table->string('subject_block');            
            $table->string('subject_day');           
            $table->integer('year_level');  
            $table->string('name');
            $table->string('status');
            $table->timestamps();

            $table->foreign('studentid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrolls');
    }
};
