@extends('templates.master-secretario')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')


	{!! Form::open(['route' => 'student.storeSec', 'method' => 'post', 'class' => 'form-padrao']) !!}
		@include('templates.formulario.imput',['imput' => 'name', 'attributes' => ['placeholder' => 'Nome']])
		@include('templates.formulario.imput',['imput' => 'phone', 'attributes' => ['placeholder' => 'Telefone']])
		@include('templates.formulario.select',['label'=> 'Curso', 'select' => 'curso_id', 'value' => $cursos, 'attributes' => ['placeholder' => 'Curso']])

		@include('templates.formulario.date',['imput' => 'birth', 'attributes' => ['placeholder' => 'Data de nascimento']])
		@include('templates.formulario.imput',['imput' => 'email', 'attributes' => ['placeholder' => 'Email']])
		@include('templates.formulario.imput',['imput' => 'igreja', 'attributes' => ['placeholder' => 'Igreja']])
		@include('templates.formulario.imput',['imput' => 'responsavel', 'attributes' => ['placeholder' => 'Responsável']])
		@include('templates.formulario.imput',['imput' => 'endereço', 'attributes' => ['placeholder' => 'Endereço']])
		
		@include('templates.formulario.date',['imput' => 'data_vencimento_inicial','attributes' => ['placeholder' => 'Data da primeira parcela']])

		@include('templates.formulario.select',['label'=> 'Plano', 'select' => 'plano_id', 'value' => $planos, 'attributes' => ['placeholder' => 'Plano']])

		@include('templates.formulario.submit',['imput' => 'Cadastrar'])
	{!! Form::close() !!}

@endsection