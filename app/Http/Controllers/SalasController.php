<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\SalaCreateRequest;
use App\Http\Requests\SalaUpdateRequest;
use App\Repositories\SalaRepository;
use App\Validators\SalaValidator;
use App\Services\SalaService;
use App\Repositories\CursoRepository;
use App\Models\Professor;


/**
 * Class SalasController.
 *
 * @package namespace App\Http\Controllers;
 */
class SalasController extends Controller
{
    /**
     * @var SalaRepository
     */
    protected $repository;
    protected $cursoRepository;
    protected $service;

    /**
     * SalasController constructor.
     *
     * @param SalaRepository $repository
     * @param SalaValidator $validator
     */
    public function __construct(SalaRepository $repository, SalaService $service, CursoRepository $cursoRepository)
    {
        $this->repository       = $repository;
        $this->service          = $service;
        $this->cursoRepository  = $cursoRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        $salas  = $this->repository->all();
        $cursos = $this->repository->all();
        $professors  = Professor::all();
        
        return view('sala.index', [
            'salas'  => $salas,
            'cursos' => $cursos,
            'professors' => $professors
        ]);
    }

    public function indexSecretario()
    {     
        $salas  = $this->repository->all();
        $cursos = $this->repository->all();
        $professors  = Professor::all();
        
        return view('sala.secretario', [
            'salas'  => $salas,
            'cursos' => $cursos,
            'professors' => $professors
        ]);
    }
    
    public function store(SalaCreateRequest $request)
    {
       $request = $this->service->store($request->all());
       $sala = $request['success'] ? $request['data'] : null;

       session()->flash('success',[
            'success' => $request['success'],
            'messages' => $request['messages'],   
        ]);

        return redirect()->route('sala.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sala = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $sala,
            ]);
        }

        return view('salas.show', compact('sala'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sala = $this->repository->find($id);

        return view('salas.edit', compact('sala'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SalaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(SalaUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $sala = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Sala updated.',
                'data'    => $sala->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($sala_id)
    {
        //$deleted = $this->repository->delete($id);

         $this->repository->delete($sala_id);

        return redirect()->route('sala.index');
    }
}
