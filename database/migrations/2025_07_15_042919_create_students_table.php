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
        Schema::create('students', function (Blueprint $table) {
            $table->id();


            //basic info
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();

            //personal info
            $table->enum('gender',['Male','Female','Other'])->nullable();
            $table->date('dob')->nullable();

            $table->unsignedBigInteger('class_id'); // fk to classes table bb
            $table->string('roll_no');
            $table->unique(['class_id', 'roll_no']);

            //address
            $table->string('address')->nullable();
            $table->String('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();

            // image
            $table->string('photo')->nullable();





            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
