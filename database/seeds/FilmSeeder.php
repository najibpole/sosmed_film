<?php

use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('set foreign_key_checks=0;');
    	DB::table('film')->truncate();
    	$data = [];
    	$faker = \Faker\Factory::create('id_ID');
    	$kategori = DB::table('kategori_film')->get();
    	foreach (range(1,100) as $angka) {
    		$data[] = [
    			'nama'					=> 'Film '.$angka,
    			'author'				=> 'Author '.$angka,
    			'tahun'					=> $faker->randomElement(range(2010,2019)),
    			'gambar'				=> $faker->imageUrl(),
    			'deskripsi'				=> $faker->text,
    			'kategori_film_id'		=> $faker->randomElement($kategori->pluck('id')->toArray()),
    			'created_at'			=> date('Y-m-d H:i:s'),
    			'updated_at'			=> date('Y-m-d H:i:s'),
    		];
    	}
    	// dd($data);
    	DB::table('film')->insert($data);
    }
}
