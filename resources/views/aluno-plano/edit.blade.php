@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')


	{!! Form::model($plano, ['route' => ['aluno-plano.update', $alunoPlano], 'method' => 'put', 'class' => 'form-padrao']) !!}
		@include('templates.formulario.imput',['label'=> 'Tipo de Pagamento','imput' => 'quant_parcelas', 'attributes' => ['placeholder' => 'Ex:1']])
		@include('templates.formulario.submit',['imput' => 'Salvar'])
	{!! Form::close() !!}

@endsection