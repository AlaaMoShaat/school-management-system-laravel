<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('grade_id')->constrained('grades','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('classroom_id')->constrained('classrooms','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('section_id')->constrained('sections','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('teacher_id')->constrained('teachers','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('date');
            $table->boolean('status');
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
        Schema::dropIfExists('attendances');
    }
}