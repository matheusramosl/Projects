<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Softdeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
	public $timestamps = true;
	protected $table = 'users';
    protected $fillable = [
    	'id',
    	'name',
    	'cpf',
    	'phone',
    	'email',
    	'password'
    ];
    protected $hidden = [
        'password', 
        'remember_token'
    ];
}
