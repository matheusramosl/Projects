@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')


	{!! Form::model($plano, ['route' => ['finance.update', $plano->id], 'method' => 'put', 'class' => 'form-padrao']) !!}
		@include('templates.formulario.imput',['label'=> 'Nome do Plano','imput' => 'nome_plano', 'attributes' => ['placeholder' => 'Nome do Plano']])
		@include('templates.formulario.imput',['label'=> 'Valor das Parcelas','imput' => 'valor_parcelas', 'attributes' => ['placeholder' => 'Ex:225']])
		@include('templates.formulario.imput',['label'=> 'Valor para o Professor','imput' => 'valor_prof', 'attributes' => ['placeholder' => 'Ex:150']])
		@include('templates.formulario.imput',['label'=> 'Valor para a Escola De Música','imput' => 'valor_escola', 'attributes' => ['placeholder' => 'Ex:200']])
		@include('templates.formulario.imput',['label'=> 'Quantidade de Parcelas','imput' => 'quant_parcelas', 'attributes' => ['placeholder' => 'Ex:1']])
		@include('templates.formulario.submit',['imput' => 'Salvar'])
	{!! Form::close() !!}

@endsection