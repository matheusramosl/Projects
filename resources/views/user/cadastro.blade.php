@extends('templates.cadastrar')


@section('conteudo-cadastro')

	{!! Form::open(['route' => 'user.store', 'method' => 'post', 'class' => 'form-padrao']) !!}
		@include('templates.formulario.imput',['imput' => 'name', 'attributes' => ['placeholder' => 'Nome']])
		@include('templates.formulario.imput',['imput' => 'cpf', 'attributes' => ['placeholder' => 'Cpf']])
		@include('templates.formulario.imput',['imput' => 'email', 'attributes' => ['placeholder' => 'Email']])
		@include('templates.formulario.imput',['imput' => 'phone', 'attributes' => ['placeholder' => 'Telefone']])
		
		@include('templates.formulario.select',['label' => 'Perfil Usuário' ,'select' => 'profile_id', 'value' => $profile_list, 'attributes' => ['placeholder' => 'Profile']])

		@include('templates.formulario.password',['imput' => 'password', 'attributes' => ['placeholder' => 'Senha']])
		@include('templates.formulario.submit',['imput' => 'Cadastrar'])
	{!! Form::close() !!}

@endsection

