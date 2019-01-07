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
			<td>Forma de Pagamento</td>
			<td>Horário</td>
			
		</tr>
		
	</thead>
	<tbody>
		@foreach($student->cursos as $curso)
		<tr>
			<td>{{ $curso->name}}</td>
			<td>
				@foreach($curso->salas as $sala)
				{{ $sala->name }}
				@endforeach
			</td>
			<td>
				
			</td>
			<td>{{ $curso->horarios}}</td>
		</tr>
		@endforeach
	</tbody>
</table>

	{!! Form::open(['route' => 'student.store', 'method' => 'post', 'class' => 'form-padrao']) !!}

		@include('templates.formulario.imput',['label' => 'Efetuar pagamento', 'imput' => 'valor', 'attributes' =>['placeholder' => 'Valor a Pagar']])
		@include('templates.formulario.submit',['imput' => 'Pagar'])

	{!! Form::close() !!}

@endsection