<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('posts', function (Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->increments('id');
		    $table->string('title', 255);
		    $table->string('short_description', 255);
		    $table->text('description');
		    $table->string('image_url', 255);
		    $table->integer('user_id')->unsigned();
		    $table->foreign('user_id')->references('id')->on('users');
		    $table->string('slug', 255);
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
	    Schema::drop('posts');
    }
}
