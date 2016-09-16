<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('users')->insert([
		    'name' => 'slava',
		    'email' => 'slava@admin.com',
		    'password' => bcrypt('123123'),
		    'created_at' => '2016-09-12 00:00:00'
	    ]);

	    DB::table('roles')->insert([
		    'id'   => '1',
		    'slug' => 'admin',
		    'name' => 'Администратор сайта',
		    'permissions' => '{"admin.access":true}',
		    'created_at' => '2016-09-12 00:00:00'
	    ]);

	    DB::table('roles')->insert([
		    'id'   => '2',
		    'slug' => 'editor',
		    'name' => 'Редактор',
		    'permissions' => '',
		    'created_at' => '2016-09-12 00:00:00'
	    ]);


	    DB::table('role_users')->insert([
		    'user_id' => '1',
		    'role_id' => '1',
		    'created_at' => '2016-09-12 00:00:00'
	    ]);

	    DB::table('activations')->insert([
		    'user_id' => '1',
		    'code' => 'KAeedobpdF5ngq62xSPIzx1zdZkjjk2P',
		    'completed' => '1',
		    'completed_at' => '2016-09-12 00:00:00',
		    'created_at' => '2016-09-12 00:00:00'
	    ]);
    }
}
