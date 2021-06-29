<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('user_id')->nullable();
            $table->integer('amount')->nullable();
            $table->string('amount_captured')->nullable();
            $table->string('amount_refunded')->nullable();
            $table->string('captured')->nullable();
            $table->string('currency')->nullable();
            $table->string('description')->nullable();
            $table->string('outcome')->nullable();
            $table->string('paid')->nullable();
            $table->string('payment_method_details')->nullable();
            $table->string('receipt_url')->nullable();
            $table->string('status')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_payments');
    }
}
