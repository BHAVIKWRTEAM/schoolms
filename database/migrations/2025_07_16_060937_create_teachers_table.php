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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();

            // Basic Info
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();

            // Personal Info
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->date('dob')->nullable();

            // Professional Info
            $table->string('qualification')->nullable();         // e.g., M.Sc., B.Ed., etc.
            $table->string('experience')->nullable();            // e.g., 5 years, 10 years
            $table->text('bio')->nullable();                     // short intro or profile summary

            // Address
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();

            // Profile Photo
            $table->string('photo')->nullable();

            // Link to login user
            $table->unsignedBigInteger('user_id')->nullable()->unique();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
