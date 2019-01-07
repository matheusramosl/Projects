<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function homepage(){
    	return view('welcome');
    }

    public function cadastroAluno(){
    	return view('student.cadastro');
    }
    public function cadastroProfessor(){
        return view('professor.cadastro');
    }
    public function cadastroCurso(){
        return view('curso.cadastro');
    }

/*
------------------Metodo de login usuario: view-------------------
*/
    public function fazerLogin(){
        
       return view('user.login');
    }
}
