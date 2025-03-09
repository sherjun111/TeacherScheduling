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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('subject_code');
            $table->string('subject_name');            
            $table->string('subject_time');
            $table->string('subject_room');
            $table->string('subject_block');            
            $table->string('subject_day');   
            $table->string('year_level', 5);          
            $table->string('category_slug')->unique();
            $table->string('category_image');
            $table->string('ordering');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
