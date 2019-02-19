<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlunoPlano extends Model
{
    protected $table = 'aluno_plano';
    public $timestamps = true;
    protected $fillable = [
        'data_pagamento',
        'payment_type', 
        'pago'
    ];


    public function matricula(){
        return $this->belongsTo(CursoStudents::class);
    }

    public function plano(){
        return $this->belongsTo(Finance::class);
    }

   /* public function getSelectbox() {
        $arr = $this->all();
        $result = ['crédito'=>"Crédito",'débito'=>"Débito",'dinheiro'=>"Dinheiro",'cheque'=>"Cheque"];

        return $result;
    }*/
}

