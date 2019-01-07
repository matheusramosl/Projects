@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')

	@if(session('success'))
		<h3>{{ session('success')['messages'] }}<h3>	
	@endif

{!! Form::open(['route' => 'sala.store', 'method' => 'post', 'class' => 'form-padrao']) !!}
			@include('templates.formulario.imput',['label'=> 'Sala', 'imput' => 'name', 'attributes' =>['placeholder' => 'Número da Sala']])
			@include('templates.formulario.submit',['imput' => 'Criar'])
		{!! Form::close() !!}

<table class="default-table">
	<thead>

		<tr>

			<td>Sala</td>
			<td>Curso</td>
			<td>Professor</td>
			<td>Horário</td>
			<td>Menu</td>
		</tr>
		
	</thead>
	<tbody>
		@foreach($salas as $sala)
		<tr>
			<td>{{ $sala->name }}</td>
			<td>
				@foreach($sala->cursos as $curso)
				{{ $curso->name }}|
				@endforeach
			</td>
			<td>
				--
			</td>
			<td>
				@foreach($sala->cursos as $curso)
				{{ $curso->horarios }}|
				@endforeach
			</td>
			<td>
				{!! Form::open(['route' => ['sala.destroy', $sala->id], 'method'=> 'DELETE']) !!}
				{!! Form::submit('Remover') !!}
				{!! Form::close() !!}
				
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@endsection