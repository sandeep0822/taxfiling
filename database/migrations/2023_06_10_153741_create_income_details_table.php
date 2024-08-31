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
        Schema::create('income_details', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('First')->nullable();
            $table->string('Second')->nullable();
            $table->string('Third')->nullable();
            $table->string('Fourth')->nullable();
            $table->string('Fifth')->nullable();
            $table->string('Sixth')->nullable();
            $table->string('Seventh')->nullable();
            $table->string('Eighth')->nullable();
            $table->string('Ninth')->nullable();
            $table->string('Tenth')->nullable();
            $table->string('Eleventh')->nullable();
            $table->string('Twelfth')->nullable();
            $table->string('Thirteenth')->nullable();
            $table->string('Fourteenth')->nullable();
            $table->string('Fifteenth')->nullable();
            $table->string('Sixteenth')->nullable();
            $table->string('Seventeenth')->nullable();
            $table->string('Eighteenth')->nullable();
            $table->string('Nineteenth')->nullable();
            $table->string('Twentieth')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('income_details');
    }
};
