<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('date_birth');
            $table->string('academic_year');
            $table->foreignId('parent_id')->constrained('my_parents','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('gender_id')->constrained('genders','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('religion_id')->constrained('religions','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('nationality_id')->constrained('nationalities','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('blood_id')->constrained('bloods','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('grade_id')->constrained('grades','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('classroom_id')->constrained('classrooms','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('section_id')->constrained('sections','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}