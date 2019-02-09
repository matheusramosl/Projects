@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')


	{!! Form::open(['route' => 'student.store', 'method' => 'post', 'class' => 'form-padrao']) !!}
		@include('templates.formulario.imput',['label'=> 'Nome','imput' => 'name', 'attributes' => ['placeholder' => 'Nome']])
		@include('templates.formulario.imput',['label'=> 'Telefone','imput' => 'phone', 'attributes' => ['placeholder' => 'Telefone']])
		@include('templates.formulario.imput',['label'=> 'Telefone Responsável','imput' => 'phone_resp', 'attributes' => ['placeholder' => 'Telefone Responsável']])
		@include('templates.formulario.select',['label'=> 'Curso', 'select' => 'curso_id', 'value' => $cursos, 'attributes' => ['placeholder' => 'Curso']])

		@include('templates.formulario.date',['label'=> 'Data de nascimento','imput' => 'birth', 'attributes' => ['placeholder' => 'Data de nascimento']])
		@include('templates.formulario.imput',['label'=> 'Email','imput' => 'email', 'attributes' => ['placeholder' => 'Email']])
		@include('templates.formulario.imput',['label'=> 'Igreja','imput' => 'igreja', 'attributes' => ['placeholder' => 'Igreja']])
		@include('templates.formulario.imput',['label'=> 'Responsável','imput' => 'responsavel', 'attributes' => ['placeholder' => 'Responsável']])
		@include('templates.formulario.imput',['label'=> 'Endereço','imput' => 'endereço', 'attributes' => ['placeholder' => 'Endereço']])
		
		@include('templates.formulario.date',['label'=> 'Data da primeira parcela','imput' => 'data_vencimento_inicial','attributes' => ['placeholder' => 'Data da primeira parcela']])

		@include('templates.formulario.select',['label'=> 'Plano', 'select' => 'plano_id', 'value' => $planos, 'attributes' => ['placeholder' => 'Plano']])

		@include('templates.formulario.submit',['imput' => 'Cadastrar'])
	{!! Form::close() !!}

@endsection