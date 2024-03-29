<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(AdminSeeder::class);
        $this->call(MemberSeeder::class);
        $this->call(KategoriFilmSeeder::class);
        $this->call(FilmSeeder::class);
    }
}
