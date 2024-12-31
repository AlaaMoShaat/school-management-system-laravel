<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->foreignId('student_id')->constrained('students','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('fee_invoice_id')->nullable()->constrained('fee_invoices','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('receipt_id')->nullable()->constrained('receipt_students','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('processing_fee_id')->nullable()->constrained('processing_fees','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('payment_id')->nullable()->constrained('payment_students','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('debit',8,2)->nullable();
            $table->decimal('credit',8,2)->nullable();
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
        Schema::dropIfExists('student_accounts');
    }
}