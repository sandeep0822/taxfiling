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
        Schema::create('residency_details', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('SR_2022')->nullable();
            $table->string('POS_Start_2022')->nullable();
            $table->string('POS_End_2022')->nullable();
            $table->string('SR_2021')->nullable();
            $table->string('POS_Start_2021')->nullable();
            $table->string('POS_End_2021')->nullable();
            $table->string('SR_2020')->nullable();
            $table->string('POS_Start_2020')->nullable();
            $table->string('POS_End_2020')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residency_details');
    }
};
