<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Softdeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Secretario extends Authenticatable
{
    public $timestamps = true;
	protected $table = 'secretarios';
    protected $fillable = [
    	'name',
    	'cpf',
    	'phone',
    	'email',
    	'password',
        
    ];
    protected $hidden = [
        'password', 
        'remember_token'
    ];
}
