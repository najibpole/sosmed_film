<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('set foreign_key_checks=0;');
    	DB::table('users')->truncate();
    	$data[] = [
    		'nama'				=> 'Hairul Anam',
    		'email'				=> 'hairulanam21@gmail.com',
    		'password'			=> bcrypt('12345'),
    		'created_at'		=> date('Y-m-d H:i:s'),
    		'updated_at'		=> date('Y-m-d H:i:s'),
    	];
    	DB::table('users')->insert($data);
    }
}
