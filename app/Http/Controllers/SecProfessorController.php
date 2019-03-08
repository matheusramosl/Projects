<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;
use App\Repositories\ProfessorRepository;
use App\Models\Curso;
use DB;

class SecProfessorController extends Controller
{
    protected $repository;


    public function __construct(ProfessorRepository $repository)
    {
        $this->repository   =   $repository;
	}

	public function indexSecretario(Request $curso){

        $professors = $this->repository->all();
        $cursos   = $this->repository->all();

        return view('professor.secretario',[
            'professors' => $professors,
            'cursos'   => $cursos,
        ]);

    }
     
     public function show(Professor $professor, $id)
    {
        return view('professor.sec_show',['professor' => Professor::findOrFail($id)]);
    }
}
