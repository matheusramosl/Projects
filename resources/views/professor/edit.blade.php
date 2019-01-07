@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')

	{!! Form::model($professor, ['route' => ['professor.update', $professor->id], 'method' => 'put', 'class' => 'form-padrao']) !!}
		@include('templates.formulario.imput',['imput' => 'name', 'attributes' => ['placeholder' => 'Nome']])
		@include('templates.formulario.imput',['imput' => 'email', 'attributes' => ['placeholder' => 'Email']])
		@include('templates.formulario.imput',['imput' => 'cpf', 'attributes' => ['placeholder' => 'CPF']])
		@include('templates.formulario.imput',['imput' => 'phone', 'attributes' => ['placeholder' => 'Telefone']])
		@include('templates.formulario.imput',['imput' => 'igreja', 'attributes' => ['placeholder' => 'Igreja']])
		@include('templates.formulario.submit',['imput' => 'Atualizar'])
	{!! Form::close() !!}

@endsection