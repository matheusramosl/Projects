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
			
			<td>Plano</td>
			<td>Vl. Parcela</td>

			<td>Dt. Vencimento</td>
			<td>Dt. Pagamento</td>
			<td>Pago?</td>
			<td>Tp. Pagamento</td>
			<td>Criado em</td>
			<td>Menu</td>
		</tr>
		
	</thead>
	<tbody>
			@foreach($alunosPlanos as $alunoPlano)
				<tr>
					<td>{{ $alunoPlano->matricula->student->name }}</td>
					<td>{{ $alunoPlano->matricula->curso->name }}</td>

					<td>{{ $alunoPlano->plano->nome_plano }}</td>
					<td>{{ $alunoPlano->plano->valor_parcelas }}</td>

					<td>{{ $alunoPlano->data_vencimento }}</td>
					<td>{{ $alunoPlano->data_pagamento }}</td>
					<td>{{ $alunoPlano->pago == 0 ? 'Não' : 'Sim' }}</td>
					<td>{{ $alunoPlano->payment_type }}</td>
					<td>{{ $alunoPlano->created_at }}</td>
					<td>
					<a href="{{ route('aluno-plano.edit', $alunoPlano) }}">Pagar</a>
					</td>
				</tr>
			@endforeach

	</tbody>
</table>

@endsection