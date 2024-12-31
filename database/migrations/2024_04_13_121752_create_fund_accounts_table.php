<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fund_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receipt_id')->nullable()->constrained('receipt_students','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('payment_id')->nullable()->constrained('payment_students','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('debit',8,2)->nullable();
            $table->decimal('credit',8,2)->nullable();
            $table->date('date');
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
        Schema::dropIfExists('fund_accounts');
    }
}
