<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriFilm extends Model
{
    protected $table = 'kategori_film';

   	protected $fillable = [
   		'nama',
   	];
}
