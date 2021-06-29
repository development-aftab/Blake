<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('user_id')->nullable();
            $table->integer('package_id')->nullable();
            $table->string('amount')->nullable();
            $table->string('card_number')->nullable();
            $table->string('cvv')->nullable();
            $table->string('card_expiration')->nullable();
            $table->string('subscription_expiration')->nullable();
            $table->string('subscription_status')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payment_details');
    }
}
