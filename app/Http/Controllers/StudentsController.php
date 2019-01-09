<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\StudentCreateRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Repositories\StudentRepository;
use App\Repositories\CursoRepository;
use App\Repositories\PaymentsRepository;
use App\Services\StudentService;
use App\Models\Students;
use App\Models\Curso;
use DB;

/**
 * Class StudentsController.
 *
 * @package namespace App\Http\Controllers;
 */
class StudentsController extends Controller
{

    protected $repository;
    protected $cursoRepository;
    protected $service;


    public function __construct(StudentRepository $repository, StudentService $service, CursoRepository $cursoRepository)
    {
        $this->repository         =   $repository;
        $this->cursoRepository    =   $cursoRepository;
        $this->service            =   $service;

    }

    public function index(Request $curso){

        $students = $this->repository->all();
        $cursos   = $this->repository->all();

        return view('student.index',[
            'students' => $students,
            'cursos'   => $cursos,
        ]);

    }
    public function indexSecretario(Request $curso){

        $students = $this->repository->all();
        $cursos   = $this->repository->all();

        return view('student.secretario',[
            'students' => $students,
            'cursos'   => $cursos,
        ]);

    }
    public function indexProfessor(Request $curso){

        $students = $this->repository->all();
        $cursos   = $this->repository->all();

        return view('student.professor',[
            'students' => $students,
            'cursos'   => $cursos,
        ]);

    }

   public function cadastroAluno(){

        $curso_list   =   $this->cursoRepository->selectBoxList();

        return view('student.cadastro',[
            'curso_list'   => $curso_list,
        ]);
    }

    public function store(StudentCreateRequest $request)
    {
    
        $status  = $this->service->store($request->all());
        $student = $status['success'] ? $status['data'] : null;    
        $student->cursos()->attach($request->curso_id);
       
        session()->flash('success',[
            'success'  => $request['success'],
            'messages' => $request['messages'],   
        ]);

        return redirect()->route('student.index');
    }

    public function show(Students $student)
    {
        return view('student.show', compact('student') );
    }

    public function edit($id)
    {
        $student    = $this->repository->find($id);
        $curso_list = $this->cursoRepository->selectBoxList();

        return view('student.edit', [
            'student'    => $student,
            'curso_list' => $curso_list,
        ]);
    }


    public function update(Request $request, $student_id)
    {
      $status = $this->service->update($student_id, $request->all());
      //$student = $status['success'] ? $status['data'] : null;    
      //$student->cursos()->attach($request->curso_id);
       
        session()->flash('success',[
            'success'  => $request['success'],
            'messages' => $request['messages'],   
        ]);

        return redirect()->route('student.index');  
    }

    public function destroy($student_id)
    {
        //dd($student_id);
        $status = $this->service->delete($student_id);
        //$this->repository->delete($student_id);

        return redirect()->route('student.index');

    }

    public function search(Request $request, Students $student, Curso $curso){

        $dataForm = $request->all();
        //$dataF= $request->all();

        $students = $student->search($dataForm);
        //$curso = $curso->search1($dataForm);
        //dd($dataForm);
        //return redirect()->route('student.index');
        return view('student.index', compact('students'));

    }

}
