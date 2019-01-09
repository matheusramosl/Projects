<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


class Students extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    public $timestamps = true;
    protected $fillable = [
    	'name',
    	'igreja',
    	'phone',
    	'responsavel',
    	'endereço',
    	'email',
        'birth',
    ];

    /*public function getBirthAttribute(){
        if(empty($this->attributes['birth']))
            return null;
        $birth = $this->attributes['birth'];
        return substr($birth, 0, 2).'/'.substr($birth, 3, 2).'/'.substr($birth, -4);
        //carbon
    }*/

    public function setBirthAttribute($value){
       
        if(empty($value))
            return null;
        $this->attributes['birth'] = Carbon::parse($value)->format('Y/m/d');
    }

    public function getBirthAttribute($value)
    {
        if(!empty($this->attributes['birth']))
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getPhoneAttribute(){
        $phone = $this->attributes['phone'];
        return substr($phone, 0, 5).'-'.substr($phone, -4);
    }

    public function cursos(){
        return $this->belongsToMany(Curso::class, 'curso_students', 'student_id', 'curso_id');
    }

    public function planos(){
        return $this->hasMany(AlunoPlano::class, 'student_id');
    }

    public function search(Array $data){
        return $this->where(function($query) use ($data){
            if (isset($data['name'])) 
                $query->where('name', 'like', '%'.$data['name'].'%' );

             if (isset($data['id'])) 
                $query->where('id', $data['id'] );
        })
        ->paginate();     
    }
}
