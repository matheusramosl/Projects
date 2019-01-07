<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;


class Professor extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    public $timestamps  = true;
	protected $table    = 'professors';
    protected $fillable = [
    	'name',
    	'igreja',
    	'phone',
    	'cpf',
    	'email',
    ];

    public function cursos(){
        return $this->hasMany(Curso::class);
    }
    

}
