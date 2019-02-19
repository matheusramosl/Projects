<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Curso.
 *
 * @package namespace App\Models;
 */
class Curso extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    protected $fillable = [
    	'name',
		'horarios',
		'professor_id',
    ];

    public function professors(){
    	return $this->belongsTo(Professor::class, 'professor_id');
    }

    public function students(){
        return $this->belongsToMany(Students::class, 'curso_students' ,'curso_id', 'student_id');
    }
    public function salas(){
        return $this->belongsToMany(Sala::class, 'curso_salas', 'curso_id', 'sala_id');
    }
    //Dia do curso
    public function search1(Array $c){
        return $this->where(function($query) use ($c){
            if (isset($c['name'])) 
                $query->where('name', $c['name'] );
        })
        ->paginate();
    }

    public function getSelectbox() {
        $arr = $this->all();
        $result = [];
        foreach ($arr as $value) {
            $result[$value->id] = $value->name;
        }

        return $result;
    }

}
