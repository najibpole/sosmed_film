<?php

use Illuminate\Database\Seeder;

class KategoriFilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    	DB::table('kategori_film')->truncate();
    	$data = [];
    	foreach (range(1, 6) as $kategori) {
    		$data[] = [
    			'nama'	=> 'Kategori '.$kategori,
    		];
    	}
        DB::table('kategori_film')->insert($data);
    }
}
