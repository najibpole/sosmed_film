<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertemanan extends Model
{
	protected $table = 'pertemanan';

	protected $fillable = [
		'member_id',
		'teman_id',
		'status'
	];

	public function teman()
	{
		return $this->belongsTo('App\Member', 'teman_id');
	}

	public function member()
	{
		return $this->belongsTo('App\Member', 'member_id');
	}
}
