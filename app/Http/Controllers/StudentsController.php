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
use App\Models\Finance;
use App\Models\AlunoPlano;
use Carbon\Carbon;
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
        $curso = new Curso();
        $finance = new Finance();
        
        $cursos = $curso->getSelectbox();
        $planos = $finance->getSelectbox();

        return view('student.cadastro', compact('cursos','planos'));
    }

     public function cadastroAlunoSec(){
        $curso = new Curso();
        $finance = new Finance();
        
        $cursos = $curso->getSelectbox();
        $planos = $finance->getSelectbox();

        return view('student.sec_cadastro', compact('cursos','planos'));
    }

    public function storeSec(Request $request)
    {        
        $status  = $this->service->store($request->all());
        $student = $status['success'] ? $status['data'] : null;    
        //$student = $status['success'] ? $status['data'] : null;
        $test = $student->cursos()->attach($request->curso_id);

        $vencimento = $request->data_vencimento_inicial;  

        $finances = Finance::find($request->plano_id);
        for ( $i = 0; $i < $finances->quant_parcelas; $i++) { 
            $alunoPlano = new AlunoPlano;
            $alunoPlano->plano_id = $request->plano_id;
            $alunoPlano->matricula_id = $student->id;
            $alunoPlano->data_vencimento = Carbon::parse($vencimento)->addMonths($i); //@todo: alterar para pegar a data de vencimento inicial do form
            $alunoPlano->save();
        }
        session()->flash('success',[
            'success'  => $request['success'],
            'messages' => $request['messages'],   
        ]);

        return redirect()->route('student.secretario');
    }

    public function store(Request $request)
    {        
        $status  = $this->service->store($request->all());
        $student = $status['success'] ? $status['data'] : null;    
        $test = $student->cursos()->attach($request->curso_id);
        
        $matricula = DB::table('curso_students')->where('curso_id', $request->curso_id)->where('student_id', $student->id)->get();
        
        $vencimento = $request->data_vencimento_inicial;
        $finances = Finance::find($request->plano_id);
        for ( $i = 0; $i < $finances->quant_parcelas; $i++) { 
            $alunoPlano = new AlunoPlano;
            $alunoPlano->plano_id = $request->plano_id;
            $alunoPlano->matricula_id = $matricula[0]->id;
            $alunoPlano->data_vencimento = Carbon::parse($vencimento)->addMonths($i); //@todo: alterar para pegar a data de vencimento inicial do form

            $alunoPlano->save();
        }
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
      $student = $status['success'] ? $status['data'] : null;    
      $student->cursos()->sync($request->curso_id);
       
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
        $students = $student->search($dataForm);

        return view('student.index', compact('students'));
    }
    public function searchS(Request $request, Students $student, Curso $curso){

        $dataForm = $request->all();
        $students = $student->search($dataForm);

        return view('student.secretario', compact('students'));
    }


    public function payments(Students $student){

        return view('student.payments', compact('students'));
    }
    public function efetuarPagamento(Request $request, AlunoPlano $alunoPlano, $id){
        /*$finances = Finance::find($request->plano_id);
        $pagamento = $finances->valor_parcelas;
        $plano = AlunoPlano::find($id);


        $valor_pagamento = valor_parcelas
        
        //$plano = new AlunoPlano;
        $plano->data_pagamento = $request->valor_pago;
        $now = new DateTime();
$datetime = $now->format('Y-m-d H:i:s'); 
        $plano = $request->input('valor_pago');
        $plano->save();
        //$alunoPlano = $request->input('valor_pago');

        /*AlunoPlano::find($id)->update($alunoPlano);
        AlunoPlano::update($request->all());
        $enunciado = new Enunciado($request->all());
        $enunciado->save();*/

        //$status  = $this->service->store($request->all());
        //$plano->valor_pago = $request->valor_pago;

        /*if ($plano->valor_parcelas) {
            'pago' = true;
        }*/
        //dd($plano);

         return redirect()->route('student.payments');
    }

}
