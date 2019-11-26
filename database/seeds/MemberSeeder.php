<?php

use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('set foreign_key_checks=0;');
    	DB::table('member')->truncate();
    	$data = [];
    	$faker = \Faker\Factory::create('id_ID');
    	foreach (range(1,100) as $angka) {
    		$data[] = [
    			'nama'				=> $faker->name,
    			'kota_lahir'		=> $faker->city,
    			'tanggal_lahir'		=> $faker->date,
    			'alamat'			=> $faker->address,
    			'email'				=> $faker->unique()->email,
    			'password'			=> bcrypt('12345'),
    			'created_at'		=> date('Y-m-d H:i:s'),
    			'updated_at'		=> date('Y-m-d H:i:s'),
    		];
    	}
    	DB::table('member')->insert($data);
    }
}
