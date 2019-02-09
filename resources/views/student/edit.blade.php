@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')


	{!! Form::model($student, ['route' => ['student.update', $student->id], 'method' => 'put', 'class' => 'form-padrao']) !!}
		@include('templates.formulario.imput',['label'=> 'Nome','imput' => 'name', 'attributes' => ['placeholder' => 'Nome']])
		@include('templates.formulario.imput',['label'=> 'Telefone','imput' => 'phone', 'attributes' => ['placeholder' => 'Telefone']])
		@include('templates.formulario.imput',['label'=> 'Telefone Responsável','imput' => 'phone_resp', 'attributes' => ['placeholder' => 'Telefone Responsável']])
		@include('templates.formulario.select',['label'=> 'Curso', 'select' => 'curso_id', 'value' => $curso_list, 'attributes' => ['placeholder' => 'Curso']])

		@include('templates.formulario.date',['label'=> 'Data de nascimento','imput' => 'birth', 'attributes' => ['placeholder' => 'Data de nascimento']])
		@include('templates.formulario.imput',['label'=> 'Email','imput' => 'email', 'attributes' => ['placeholder' => 'Email']])
		@include('templates.formulario.imput',['label'=> 'Igreja','imput' => 'igreja', 'attributes' => ['placeholder' => 'Igreja']])
		@include('templates.formulario.imput',['label'=> 'Responsável','imput' => 'responsavel', 'attributes' => ['placeholder' => 'Responsável']])
		@include('templates.formulario.imput',['label'=> 'Endereço','imput' => 'endereço', 'attributes' => ['placeholder' => 'Endereço']])
		@include('templates.formulario.submit',['imput' => 'Atualizar'])
	{!! Form::close() !!}

@endsection