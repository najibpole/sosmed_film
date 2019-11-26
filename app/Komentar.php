<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
	protected $table = 'komentar';

	protected $fillable = [
		'film_id',
		'member_id',
		'balasan_untuk',
		'isi',
	];

	public function member()
	{
		return $this->belongsTo('App\Member', 'member_id');
	}
}
