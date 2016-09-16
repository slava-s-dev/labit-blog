<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    // Таблица нужна для Sentinel
	    Schema::create('activations', function (Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->increments('id');
		    $table->integer('user_id')->unsigned();
		    $table->string('code', 255);
		    $table->tinyInteger('completed');
		    $table->timestamp('completed_at');
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
	    Schema::drop('activations');
    }
}
