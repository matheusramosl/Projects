@extends('templates.master-professor')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')
<section id="conteudo-dashboard">
<h2>@guest
	<li class="nav-item">
        <a class="nav-link" href="">{{ __('Login') }}</a>
    </li>
	@else
		<a>{{ Auth::user()->name }}</a>
@endguest
</h2>

<li><a class="dashboard" href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i> SAIR</a></li>
<h2>Bem Vindo Professor</h2>

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
                        
                        <table class="table table-striped table-bordered table-hover" >
                            <thead>
                            <tr bgcolor="#F0F0F0">
                                <th>Aluno</th>

                                <th>Presença</th>
                            </tr>

                            </thead>
                            <tbody>

                                @foreach($professors as $professor)
                                    <tr>                                        
                                        <td id="">{{ $professor -> name}}</td>
                                        <td id="">
                                        <td><input type="radio" name="presenca" id="presenca" value="P" >Presente</td>
                                        <td><input type="radio" name="presenca" id="presenca" value="A" checked>Ausente</td>
                                        </td>                                  
                                    </tr>
                                @endforeach

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

</section>

@endsection