<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmTidakDisuka extends Model
{
	protected $table = 'film_tidak_disuka';

	protected $fillable = [
		'member_id', 'film_id',
	];
}
