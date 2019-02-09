<?php

namespace App\Http\Controllers;

use App\Model\Finance;
use Illuminate\Http\Request;
use App\Http\Requests\FinanceCreateRequest;
use App\Http\Requests\FinanceUpdateRequest;
use App\Validators\FinanceValidator;
use App\Repositories\FinanceRepository;
use App\Services\FinanceService;
use DB;

class FinancesController extends Controller
{

    protected $repository;
    protected $service;


    public function __construct( FinanceValidator $validator, FinanceService $service, FinanceRepository $repository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service    = $service;  
    }
    public function index(){

        //$planos = $this->repository->all();
        $planos = $this->repository->orderBy('nome_plano', 'ASC')->get();

        return view('finance.index',[
            'planos' => $planos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cadastroFinance(){
        return view('finance.cadastro');
    }


    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FinanceCreateRequest $request)
    {

        $request   = $this->service->store($request->all());
        $plano = $request['success'] ? $request['data'] : null;
//dd($request);
        session()->flash('success',[
            'success'  => $request['success'],
            'messages' => $request['messages'],   
        ]);

        return redirect()->route('finance.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Finances  $finances
     * @return \Illuminate\Http\Response
     */
    public function show(Finances $finances)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Finances  $finances
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plano = $this->repository->find($id);

        return view('finance.edit', [
            'plano'    => $plano,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Finances  $finances
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $plano_id)
    {
        $status = $this->service->update($plano_id, $request->all());

        session()->flash('success',[
            'success'  => $request['success'],
            'messages' => $request['messages'],   
        ]);

        return redirect()->route('finance.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Finances  $finances
     * @return \Illuminate\Http\Response
     */
    public function destroy($plano_id)
    {
        $status = $this->service->delete($plano_id);
        return redirect()->route('finance.index');
    }
}
