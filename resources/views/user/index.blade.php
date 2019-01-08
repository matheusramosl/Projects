@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')

	@if(session('success'))
		<h3>{{ session('success')['messages'] }}<h3>	
	@endif

<a id="defalt-a" href="{{route('user.cadastro')}}">Novo Usuário</a>

<table class="default-table">
	<thead>
		<tr>
			<td>Matrícula</td>
			<td>Nome</td>
			<td>Email</td>
			<td>cpf</td>
			<td>Perfil</td>

		</tr>
		
	</thead>
	<tbody>
		@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->cpf }}</td>
					<td>{{ $user->profiles->name}}</td>
				</tr>
		@endforeach
	</tbody>
</table>



@endsection