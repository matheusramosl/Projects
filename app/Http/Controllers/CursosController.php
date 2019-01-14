<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CursoCreateRequest;
use App\Http\Requests\CursoUpdateRequest;
use App\Repositories\CursoRepository;
use App\Repositories\ProfessorRepository;
use App\Services\CursoService;
use App\Repositories\SalaRepository;
use App\Models\Sala;

/**
 * Class CursosController.
 *
 * @package namespace App\Http\Controllers;
 */
class CursosController extends Controller
{

    protected $repository;
    protected $professorRepository;
    protected $service;
    protected $salaRepository;

    /**
     * CursosController constructor.
     *
     * @param CursoRepository $repository
     * @param CursoValidator $validator
     */
    public function __construct(CursoRepository $repository, CursoService $service, ProfessorRepository $professorRepository, SalaRepository $salaRepository)
    {
        $this->repository           = $repository;
        $this->service              = $service;
        $this->professorRepository  = $professorRepository;
        $this->salaRepository       = $salaRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $cursos = $this->repository->all();
         $salas  = $this->repository->all();
        return view('curso.index', [
            'cursos' => $cursos,
            'salas'  => $salas,
        ]);
    }

    public function indexSecretario()
    {
         $cursos = $this->repository->all();
         $salas  = $this->repository->all();
        return view('curso.secretario', [
            'cursos' => $cursos,
            'salas'  => $salas,
        ]);
    }

    public function cadastroCurso(){

        $professor_list = $this->professorRepository->selectBoxList();
        $sala_list      = $this->salaRepository->selectBoxList();


        return view('curso.cadastro',[
            'professor_list' => $professor_list,
            'sala_list'      => $sala_list,
        ]);
    }

    public function cadastroCursoSec(){

        $professor_list = $this->professorRepository->selectBoxList();
        $sala_list      = $this->salaRepository->selectBoxList();


        return view('curso.sec_cadastro',[
            'professor_list' => $professor_list,
            'sala_list'      => $sala_list,
        ]);
    }

    public function storeSec(CursoCreateRequest $request)
    {
        $status = $this->service->store($request->all());
        $curso = $status['success'] ? $status['data'] : null;
        $curso->salas()->attach($request->sala_id);
        
        session()->flash('success',[
            'success'  => $request['success'],
            'messages' => $request['messages'],   
        ]);

        return redirect()->route('curso.secretario');
    }



    public function store(CursoCreateRequest $request)
    {
        $status = $this->service->store($request->all());
        $curso = $status['success'] ? $status['data'] : null;
        $curso->salas()->attach($request->sala_id);
        
        session()->flash('success',[
            'success'  => $request['success'],
            'messages' => $request['messages'],   
        ]);

        return redirect()->route('curso.index');
    }


    public function show($id)
    {
        $curso = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $curso,
            ]);
        }

        return view('cursos.show', compact('curso'));
    }


    public function edit($id)
    {
        $curso          = $this->repository->find($id);
        $professor_list = $this->professorRepository->selectBoxList();
        $sala_list      = $this->salaRepository->selectBoxList();

        return view('curso.edit',[
            'curso'          => $curso,
            'professor_list' => $professor_list,
            'sala_list'      => $sala_list,
        ]);
    }


    public function update(Request $request, $curso_id)
    {
        $status = $this->service->update($curso_id, $request->all());

        session()->flash('success',[
            'success'  => $request['success'],
            'messages' => $request['messages'],   
        ]);

        return redirect()->route('curso.index');  
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($curso_id)
    {
        $status = $this->service->delete($curso_id);

        return redirect()->route('curso.index');
    }
}
