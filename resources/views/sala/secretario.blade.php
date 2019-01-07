@extends('templates.master-secretario')

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

			<td>Sala</td>
			<td>Curso</td>
			<td>Professor</td>
			<td>Horário</td>
		</tr>
		
	</thead>
	<tbody>
		@foreach($salas as $sala)
		<tr>
			<td>{{ $sala->name }}</td>
			<td>
				@foreach($sala->cursos as $curso)
				{{ $curso->name }}|
				@endforeach
			</td>
			<td>
				--
			</td>
			<td>
				@foreach($sala->cursos as $curso)
				{{ $curso->horarios }}|
				@endforeach
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<!-- Fonts -->
<div class="container">
    <div class="row">
        <div class="col-sm-9">
            <div class="box box-primary">

            <div class="box-header">
                    <h3 class="box-title">Lista de Presença</h3>
                        <div class="col-sm-6">
                            <label>Turma: </label>
                            <label></label></div>

                            <label>Professor Responsável: </label>
                            <label></label>
                    </div>

                <div class="box-body">
                    <div class="table-responsive">
                        <input action="" method="post" id="">
                        <table class="table table-striped table-bordered table-hover" >
                            <thead>
                            <tr bgcolor="#F0F0F0">
                                <th>Aluno</th>
                                <th>Presença</th>
                            </tr>

                            </thead>
                            <tbody>
                         
                                <tr>
                                    <td id=""></td>
                                    <td id="">
                                    <td><input type="radio" name="presenca" id="presenca" value="P" checked>Presente</td>
                                    <td><input type="radio" name="presenca" id="presenca" value="A">Ausente</td>
                                    </td>
                                </tr>
                            
                            </tbody>
                        </table>
                            <input type="submit" class="btn btn-success" value="Finalizar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection