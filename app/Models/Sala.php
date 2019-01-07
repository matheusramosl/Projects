<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sala.
 *
 * @package namespace App\Models;
 */
class Sala extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    protected $fillable = [
    	'name',
		'description',
    ];

    public function cursos(){
    	return $this->belongsToMany(Curso::class, 'curso_salas', 'sala_id', 'curso_id');
    }

}
