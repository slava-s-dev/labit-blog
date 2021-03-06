<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('role_users', function (Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->increments('id');
		    $table->integer('user_id')->unsigned();
		    $table->integer('role_id')->unsigned();
		    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
		    $table->foreign('role_id')->references('id')->on('roles');
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
	    Schema::drop('role_users');
    }
}
