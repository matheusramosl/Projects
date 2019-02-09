@extends('templates.master')

@section('conteudo-view')
Pagamento aluno

{!! Form::text('name', 'default-value', ['class'=>'class-name','readonly']) !!}
{!! Form::open(['route' => 'student.efetuarPagamento', 'method' => 'post', 'class' => 'form-padrao']) !!}

			@include('templates.formulario.submit',['imput' => 'pagar'])
		{!! Form::close() !!}
@endsection