<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThrottleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	// Таблица нужна для Sentinel
	    Schema::create('throttle', function (Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->increments('id');
		    $table->integer('user_id')->unsigned();
		    $table->string('type', 255);
		    $table->string('ip', 255);
		    $table->timestamps();

		    $table->index('user_id');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::drop('throttle');
    }
}
