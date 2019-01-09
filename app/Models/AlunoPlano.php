<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlunoPlano extends Model
{
    protected $table = 'aluno_plano';
    public function curso(){
        return $this->belongsTo(Curso::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function plano(){
        return $this->belongsTo(Finance::class);
    }
}
