<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('amount',8,2)->nullable();
            $table->date('date');
            $table->string('description');
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
        Schema::dropIfExists('payment_students');
    }
}