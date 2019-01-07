@extends('templates.master')

@section('conteudo-view')

<header>
	<h1>{{ $professor->name }}</h1>
</header>
<table class="default-table">
	<thead>
		<tr>
			<td>Curso</td>
			<td>Sala</td>
			<td>Alunos</td>
			<td>Horários</td>
			
			
		</tr>
		
	</thead>
	<tbody>
		@foreach($professor->cursos as $curso)
		<tr>
			<td>{{ $curso->name}}</td>	
			<td>
				@foreach($curso->salas as $sala)
				{{ $sala->name }}
				@endforeach
			</td>
			<td>
				@foreach($curso->students as $student)
						<tr>
							<td></td>
							<td></td>
							<td>{{ $student->name }}</td>
							<td>{{ $curso->horarios}}</td>
						</tr>
				@endforeach
			</td>
			
		</tr>
		@endforeach
	</tbody>
</table>

@endsection