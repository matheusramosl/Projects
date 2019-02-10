@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')

@if(session('success'))
		<h3>{{ session('success')['messages'] }}<h3>	
	@endif

<table class="default-table">
	<thead>
		<tr>
			<td>Aluno</td>
			<td>Curso</td>
			<td>Criado em</td>
			<td>Menu</td>
		</tr>
		
	</thead>
	<tbody>
			@foreach($matriculas as $matricula)
				<tr>
					<td>{{ $matricula->student->name }}</td>
					<td>{{ $matricula->curso->name }}</td>
					<td>{{ $matricula->created_at }}</td>
					<td>
						<a href="{{ route('aluno-plano.show', $matricula) }}">View</a>
					</td>
				</tr>
			@endforeach

	</tbody>
</table>

@endsection