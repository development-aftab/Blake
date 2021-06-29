<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBuySalePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_sale_properties', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('location')->nullable();
            $table->string('confirm_location')->nullable();
            $table->string('unit_number')->nullable();
            $table->integer('property_type_id')->nullable();
            $table->integer('worth_id')->nullable();
            $table->integer('sale_time_id')->nullable();
            $table->integer('heard_source_id')->nullable();
            $table->integer('agent_id')->nullable();
            $table->string('requester_name')->nullable();
            $table->string('requester_phone')->nullable();
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
        Schema::drop('buy_sale_properties');
    }
}
