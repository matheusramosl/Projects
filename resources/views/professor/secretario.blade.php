@extends('templates.master-secretario')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')

	@if(session('success'))
		<h3>{{ session('success')['messages'] }}<h3>	
	@endif

<a id="defalt-a" href="{{route('professor.sec_cadastro')}}">Novo Professor</a>

<form action="{{ route('professor.search2') }}" method="POST" class="">
	{!! csrf_field() !!}
		<input type="text" name="name" id="search1" placeholder="Pesquisar Nome" >
		<input type="text" name="id"   id="search1" placeholder="Matricula" >
		<button type="submit"><i class="fa fa-search"></i></button>
</form>
<table class="default-table">
	<thead>
		<tr>
			<td>Matrícula</td>
			<td>Nome</td>
			<td>Telefone</td>
			<td>Email</td>
			<td>Igreja</td>
		</tr>
		
	</thead>
	<tbody>
		@foreach($professors as $professor)
		<tr>
			<td>{{ $professor->id }}</td>
			<td><a href="{{ route('professor.sec_show', $professor->id) }}">{{ $professor->name }}</a></td>
			<td>{{ $professor->phone }}</td>
			<td>{{ $professor->email }}</td>
			<td>{{ $professor->igreja }}</td>
		</tr>
		@endforeach
	</tbody>
</table>

@endsection