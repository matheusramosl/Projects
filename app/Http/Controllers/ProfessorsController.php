<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProfessorCreateRequest;
use App\Http\Requests\ProfessorUpdateRequest;
use App\Repositories\ProfessorRepository;
use App\Repositories\StudentRepository;
use App\Services\ProfessorService;
use App\Models\Curso;
use DB;

/**
 * Class ProfessorsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProfessorsController extends Controller
{

    protected $repository;
    protected $studentRepository;
    protected $service;


    public function __construct(ProfessorRepository $repository, ProfessorService $service, StudentRepository $studentRepository)
    {
        $this->repository        =   $repository;
        $this->studentRepository =   $studentRepository;
        $this->service           =   $service;
    }

    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $professors = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $professors,
            ]);
        }

        return view('professor.index',[
            'professors' => $professors,
        ]);

    }
    public function indexProfessor()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $professors = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $professors,
            ]);
        }

        return view('professor.index-professor',[
            'professors' => $professors,
        ]);

    }

     public function indexSecretario()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $professors = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $professors,
            ]);
        }

        return view('professor.secretario',[
            'professors' => $professors,
        ]);

    }

    public function cadastroProfessor()
    {
        return view('professor.cadastro');
    }


    public function store(ProfessorCreateRequest $request)
    {
         $request   = $this->service->store($request->all());
         $professor = $request['success'] ? $request['data'] : null;

        session()->flash('success',[
            'success'  => $request['success'],
            'messages' => $request['messages'],   
        ]);

        return redirect()->route('professor.index');
    }

    public function show($id)
    {

        /*$students=DB::table('students')
        ->join('curso_students', 'curso_students.student_id', '=' , 'students.id')
        ->get();*/
        $professors  = Curso::all();
        $professor = $this->repository->find($id);

        //dd($students);

        return view('professor.show',[
            'professor' => $professor,
            //'students'  => $students
            compact('cursos')
        ]);
    }

 
    public function edit($id)
    {
        $professor = $this->repository->find($id);

        return view('professor.edit',[
            'professor' => $professor
        ]);
    }


    public function update(Request $request, $id)
    {
        $request   = $this->service->update($request->all(), $id);
        $professor = $request['success'] ? $request['data'] : null;

        session()->flash('success',[
            'success'  => $request['success'],
            'messages' => $request['messages'],   
        ]);

        return redirect()->route('professor.index');
    }


    public function destroy($professor_id)
    {
        $this->repository->delete($professor_id);

        return redirect()->route('professor.index');
    }
}
