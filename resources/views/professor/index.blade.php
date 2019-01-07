@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')

	@if(session('success'))
		<h3>{{ session('success')['messages'] }}<h3>	
	@endif

<a id="defalt-a" href="{{route('professor.cadastro')}}">Novo Professor</a>
<table class="default-table">
	<thead>
		<tr>
			<td>Matrícula</td>
			<td>Nome</td>
			<td>Telefone</td>
			<td>Email</td>
			<td>Igreja</td>
			<td>Menu</td>
		</tr>
		
	</thead>
	<tbody>
		@foreach($professors as $professor)
		<tr>
			<td>{{ $professor->id }}</td>
			<td><a href="{{ route('professor.show', $professor->id) }}">{{ $professor->name }}</a></td>
			<td>{{ $professor->phone }}</td>
			<td>{{ $professor->email }}</td>
			<td>{{ $professor->igreja }}</td>
			<td>
				{!! Form::open(['route' => ['professor.destroy', $professor->id], 'method'=> 'DELETE']) !!}
				{!! Form::submit('Remover') !!}
				{!! Form::close() !!}
				<a href="{{ route('professor.edit', $professor->id) }}">Editar</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@endsection