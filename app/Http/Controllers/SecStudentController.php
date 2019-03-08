<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Repositories\StudentRepository;
use App\Models\AlunoPlano;
use App\Models\Curso;
use DB;

class SecStudentController extends Controller
{
	protected $repository;


    public function __construct(StudentRepository $repository)
    {
        $this->repository   =   $repository;
	}

	public function indexSecretario(Request $curso){

        $students = $this->repository->all();
        $cursos   = $this->repository->all();

        return view('student.secretario',[
            'students' => $students,
            'cursos'   => $cursos,
        ]);

    }
     
     public function show(Students $student, $id)
    {
        $students  = Curso::all();
        $planos = AlunoPlano::all();
        $student = $this->repository->find($id);
        

        return view('student.sec_show',[
            'student' => Students::findOrFail($id), 
            compact('students', 'planos')
        ]);
    }
}
