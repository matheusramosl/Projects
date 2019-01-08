@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')

@if(session('success'))
		<h3>{{ session('success')['messages'] }}<h3>	
	@endif

<a id="defalt-a" href="{{route('finance.cadastro')}}">Novo Plano</a>
<table class="default-table">
	<thead>
		<tr>
			<td>Nome do Plano</td>
			<td>Valor da Parcela</td>
			<td>Quantidade de Parcelas</td>
			<td>Menu</td>
		</tr>
		
	</thead>
	<tbody>
			@foreach($planos as $plano)
				<tr>
					<td>{{ $plano->nome_plano }}</td>
					<td>{{ $plano->valor_parcelas }}</td>
					<td>{{ $plano->quant_parcelas }}x</td>
					<td>
						{!! Form::open(['route' => ['finance.destroy', $plano->id], 'method'=> 'DELETE']) !!}
						{!! Form::submit('Remover') !!}
						{!! Form::close() !!}
						<a href="{{ route('finance.edit', $plano->id) }}">Editar</a>
					</td>
				</tr>
			@endforeach

	</tbody>
</table>

@endsection