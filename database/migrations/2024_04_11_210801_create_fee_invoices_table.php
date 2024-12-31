<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('fee_id')->constrained('fees','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('invoice_date');
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('fee_invoices');
    }
}