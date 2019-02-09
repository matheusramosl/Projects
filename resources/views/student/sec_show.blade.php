@extends('templates.master-secretario')

@section('conteudo-view')

<header>
	<h1>{{ $student->name }}</h1>
	<a href="{{ route('student.payments')}}">pagamentos</a>
</header>
<table class="default-table">
	<thead>
		<tr>
			<td>Curso</td>
			<td>Sala</td>
			<td>Horário</td>
			<td>Plano</td>
			<td>Data de Vencimento</td>
			<td>Valor</td>
			<td>Pagamento</td>
		</tr>
		
	</thead>
	<tbody>
		@foreach($student->planos as $alunoPlano)
		<tr>
			<td>{{ $alunoPlano->curso->name}}</td>
			<td>
				@foreach($alunoPlano->curso->salas as $sala)
					{{ $sala->name }}
				@endforeach
			</td>
			<td>{{ $alunoPlano->curso->horarios}}</td>
			<td>{{ $alunoPlano->plano->nome_plano}}</td>
			<td>{{ $alunoPlano->data_vencimento }}</td>
			<td>{{ $alunoPlano->plano->valor_parcelas}}</td>
			<td><a href="{{route('student.payments')}}"><i class="fa fa-search"></i></a></td>
		</tr>
		@endforeach
	</tbody>
</table>

	<!-- {!! Form::open(['route' => 'student.store', 'method' => 'post', 'class' => 'form-padrao']) !!}

		@include('templates.formulario.imput',['label' => 'Efetuar pagamento', 'imput' => 'valor', 'attributes' =>['placeholder' => 'Valor a Pagar']])
		@include('templates.formulario.submit',['imput' => 'Pagar'])

	{!! Form::close() !!} -->

@endsection