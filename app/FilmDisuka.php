<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmDisuka extends Model
{
	protected $table = 'film_disuka';

	protected $fillable = [
		'member_id', 'film_id',
	];
}
