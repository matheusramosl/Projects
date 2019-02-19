<?php

namespace App\Http\Controllers;

use App\Models\AlunoPlano;
use App\Models\CursoStudents;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AlunoPlanoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $matriculas = CursoStudents::all();
        $alunoPlanos = AlunoPlano::all();
        return view('aluno-plano.index', compact('matriculas', 'alunoPlanos') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alunosPlanos = AlunoPlano::where('matricula_id', $id)->get();
        return view('aluno-plano.show', compact('alunosPlanos') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlunoPlano  $alunoPlano
     * @return \Illuminate\Http\Response
     */
    public function edit(AlunoPlano $alunoPlano)
    {
        $formPag = [
            'crédito' =>"Crédito",
            'débito'  =>"Débito",
            'dinheiro'=>"Dinheiro",
            'cheque'  =>"Cheque"
        ];
        //dd($alunosPlanos);
        return view('aluno-plano.edit',compact('alunoPlano', 'formPag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AlunoPlano  $alunoPlano
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AlunoPlano $alunoPlano)
    {
        //dd($alunoPlano);
         $alunoPlano->pago = true;
         $alunoPlano->data_pagamento = Carbon::now();
         $alunoPlano->payment_type = $request->get('payment_type');
         $alunoPlano->valor_pago = $request->get('valor_pago');
         $alunoPlano->save();
         //$alunosPlanos = AlunoPlano::where('matricula_id', $alunoPlano->matricula_id)->get();
         return redirect()->action('AlunoPlanoController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlunoPlano  $alunoPlano
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlunoPlano $alunoPlano)
    {
        //
    }
}
