@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')

<h1>Grade Horária</h1>
<table class="default-table">
	<thead>
		<tr>
			<td>Professor</td>
			<td>Curso</td>
			<td>Aluno</td>
			<td>sala</td>
			<td>horário</td>
		</tr>
		
	</thead>
	<tbody>
		@foreach($professors as $professor)
			<tr>
				<td>{{ $professor->name }}</td>
				@foreach($professor->cursos as $curso)
					<td><b>{{ $curso->name }}</b></td>
					@foreach($curso->students as $student)
						<tr>
							<td></td>
							<td></td>
							<td>{{ $student->name }}</td>
							@foreach($curso->salas as $sala)
								<td>{{ $sala->name }}</td>
							@endforeach
							<td>{{ $curso->horarios }}</td>

						</tr>

					@endforeach
					
					
				@endforeach
			</tr>
		@endforeach
		
		
		
	</tbody>
</table>

@endsection