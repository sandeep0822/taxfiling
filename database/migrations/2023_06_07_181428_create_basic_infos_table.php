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
        Schema::create('basic_infos', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('marital_status');
            $table->string('full_name');
            $table->string('ssn');
            $table->string('occupation');
            $table->string('dob');
            $table->string('first_date');
            $table->string('citizenship');
            $table->string('visa_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basic_infos');
    }
};
