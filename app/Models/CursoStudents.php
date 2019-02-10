<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CursoStudents extends Model
{
    public $timestamps  = true;
    protected $table    = 'curso_students';
    
    public function curso(){
        return $this->belongsTo(Curso::class);
    }

    public function student(){
        return $this->belongsTo(Students::class);
    }
}
