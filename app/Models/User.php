<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Softdeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
	public $timestamps = true;
	protected $table = 'users';
    protected $fillable = [
    	'name',
    	'cpf',
    	'phone',
    	'email',
    	'password',
        'profile_id'
    ];
    protected $hidden = [
        'password', 
        'remember_token'
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value;
    }
    public function profiles(){
        return $this->belongsTo(Profile::class, 'profile_id');
    }
    public function isAdmin(){
        return $this->profile_id == 1 ? true : false;
    }

    public function isDiretor(){
        return $this->profile_id == 2 ? true : false;
    }

    public function isSecretario(){
        return $this->profile_id == 3 ? true : false;
    }

    public function isProfessor(){
        return $this->profile_id == 4 ? true : false;
    }
}