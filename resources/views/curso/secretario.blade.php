@extends('templates.master-secretario')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')

	@if(session('success'))
		<h3>{{ session('success')['messages'] }}<h3>	
	@endif

<a id="defalt-a" href="{{ route('curso.sec_cadastro') }}">Novo Curso</a>
<table class="default-table">
	<thead>
		<tr>
			<td>Nome</td>
			<td>Sala</td>
			<td>Professor</td>
			<td>Horário</td>
		</tr>
		
	</thead>
	<tbody>
		@foreach($cursos as $curso)
		<tr>
			<td>{{ $curso->name}}</td>
			<td>
				@foreach($curso->salas as $sala)
				{{ $sala->name }}
				@endforeach
			</td>
			<td>{{ $curso->professors->name}}</td>
			<td>{{ $curso->horarios}}</td>
		</tr>
		@endforeach
	</tbody>
</table>

@endsection