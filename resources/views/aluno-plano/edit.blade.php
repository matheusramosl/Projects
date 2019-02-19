@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')


	{!! Form::model($alunoPlano, ['route' => ['aluno-plano.update', $alunoPlano], 'method' => 'put', 'class' => 'form-padrao']) !!}
		@include('templates.formulario.select',['label'=> 'Tipo de Pagamento','select' => 'payment_type', 'value' => $formPag, 'attributes' => ['placeholder' => 'Forma de Pagamento']])
		@include('templates.formulario.imput',['label'=> 'Valor','imput' => 'valor_pago', 'attributes' => ['placeholder' => 'Valor']])
		@include('templates.formulario.submit',['imput' => 'Pagar'])
	{!! Form::close() !!}

@endsection