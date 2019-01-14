@extends('templates.master')

@section('conteudo-view')
Pagamento aluno
{!! Form::open(['route' => 'student.efetuarPagamento', 'method' => 'post', 'class' => 'form-padrao']) !!}
			@include('templates.formulario.imput',['label'=> 'Pagar', 'imput' => 'valor_pago', 'attributes' =>['placeholder' => 'Pagar']])
			@include('templates.formulario.submit',['imput' => 'pagar'])
		{!! Form::close() !!}
@endsection