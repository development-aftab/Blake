<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChatterTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chatter_topics', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('parent_id')->nullable();
            $table->integer('order')->nullable();
            $table->string('name')->nullable();
            $table->string('color')->nullable();
            $table->string('slug')->nullable();
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
        Schema::drop('chatter_topics');
    }
}
