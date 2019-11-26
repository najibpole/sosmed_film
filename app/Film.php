<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
	protected $table = 'film';

	protected $fillable = [
		'nama',
		'author',
		'tahun',
		'gambar',
		'deskripsi',
		'kategori_film_id',
	];

	protected $appends = [
		'gambar_url',
	];

	public function komentar()
	{
		return $this->hasMany('App\Komentar', 'film_id');
	}

	public function yangsuka()
	{
		return $this->hasMany('App\FilmDisuka', 'film_id');
	}

	public function yangtidaksuka()
	{
		return $this->hasMany('App\FilmTidakDisuka', 'film_id');
	}

	public function getGambarUrlAttribute()
	{
		if(strpos($this->gambar, 'http://') !== false){
			return $this->gambar;
		} else if(strpos($this->gambar, 'https://') !== false){
			return $this->gambar;
		} else{
			if(file_exists(storage_path('app\\'.$film->gambar))){
				return asset(\Storage::url($this->gambar));
			}
			return 'http://placehold.it/800x800';
		}
	}

}
