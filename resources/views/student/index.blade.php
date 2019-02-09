@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')

	@if(session('success'))
		<h3>{{ session('success')['messages'] }}<h3>	
	@endif

<a id="defalt-a" href="{{route('student.cadastro')}}">Novo Aluno</a>

<form action="{{ route('student.search') }}" method="POST" class="">
	{!! csrf_field() !!}
		<input type="text" name="name" id="search" placeholder="Pesquisar Nome" >
		<input type="text" name="id"   id="search" placeholder="Matricula" >
		<button type="submit"><i class="fa fa-search"></i></button>
</form>



<table class="default-table">
	<thead>
		<tr>
			<td>Matrícula</td>
			<td>Nome</td>
			<td>Curso</td>
			<td>Telefone</td>
			<td>Email</td>
			<td>Data de Nascimento</td>
			<td>Responsável</td>
			<td>Tel. Responsável</td>
			<td>igreja</td>
			<td>Endereço</td>
			<td>Menu</td>
		</tr>
		
	</thead>
	<tbody>
		@foreach($students as $student)
				<tr>
					<td>{{ $student->id }}</td>
					<td><a href="{{ route('student.show', $student->id) }}">{{ $student->name }}</a></td>
					<td>
						@foreach($student->cursos as $curso)
						{{ $curso->name }}
						@endforeach
					</td>
					<td>{{ $student->phone }}</td>
					<td>{{ $student->email }}</td>
					<td>{{ $student->birth }}</td>
					<td>{{ $student->responsavel }}</td>
					<td>{{ $student->phone_resp }}</td>
					<td>{{ $student->igreja }}</td>
					<td>{{ $student->endereço }}</td>
					<td>
						{!! Form::open(['route' => ['student.destroy', $student->id], 'method'=> 'DELETE']) !!}
						{!! Form::submit('Remover') !!}
						{!! Form::close() !!}
						<a href="{{ route('student.edit', $student->id) }}">Editar</a>
					</td>
				</tr>
		@endforeach
	</tbody>
</table>



@endsection