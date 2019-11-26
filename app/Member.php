<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Member extends Authenticatable
{
	protected $table = 'member';

	protected $fillable = [
		'nama',
		'kota_lahir',
		'tanggal_lahir',
		'alamat',
		'email',
		'password',
	];
}
