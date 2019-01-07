@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')

	{!! Form::model($curso, ['route' => ['curso.update', $curso->id], 'method' => 'put', 'class' => 'form-padrao']) !!}
		@include('templates.formulario.imput',['label'=> 'Nome', 'imput' => 'name', 'attributes' => ['placeholder' => 'Nome']])
		@include('templates.formulario.imput',['label'=> 'Horário', 'imput' => 'horarios', 'attributes' => ['placeholder' => 'Horário']])
		@include('templates.formulario.select',['label'=> 'Professor', 'select' => 'professor_id', 'value' => $professor_list, 'attributes' => ['placeholder' => 'Professor']])
		@include('templates.formulario.select',['label'=> 'Sala', 'select' => 'sala_id' , 'value' => $sala_list ,'imput' => 'sala', 'attributes' => ['placeholder' => 'Sala']])
		@include('templates.formulario.submit',['imput' => 'Cadastrar'])
	{!! Form::close() !!}

@endsection