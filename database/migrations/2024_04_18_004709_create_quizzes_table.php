<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('subject_id')->constrained('subjects','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('grade_id')->constrained('grades','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('classroom_id')->constrained('classrooms','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('section_id')->constrained('sections','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('teacher_id')->constrained('teachers','id')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('quizzes');
    }
}