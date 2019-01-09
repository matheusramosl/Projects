@extends('templates.master')

@section('conteudo-view')

<header>
	<h1>{{ $student->name }}</h1>
</header>
<table class="default-table">
	<thead>
		<tr>
			<td>Curso</td>
			<td>Sala</td>
			<td>Horário</td>
			<td>Plano</td>
		</tr>
		
	</thead>
	<tbody>
		@foreach($student->planos as $alunoPlano)
		<tr>
			<td>{{ $alunoPlano->curso->name}}</td>
			<td>
				@foreach($alunoPlano->curso->salas as $sala)
				{{ $sala->name }}
				@endforeach
			</td>
			<td>{{ $alunoPlano->curso->horarios}}</td>
			<td>{{ $alunoPlano->plano->nome_plano}}</td>
		</tr>
		@endforeach
	</tbody>
</table>

	{!! Form::open(['route' => 'student.store', 'method' => 'post', 'class' => 'form-padrao']) !!}

		@include('templates.formulario.imput',['label' => 'Efetuar pagamento', 'imput' => 'valor', 'attributes' =>['placeholder' => 'Valor a Pagar']])
		@include('templates.formulario.submit',['imput' => 'Pagar'])

	{!! Form::close() !!}

@endsection