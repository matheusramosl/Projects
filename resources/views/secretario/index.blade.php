@extends('templates.master-secretario')

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
<h1>Bem Vindo Secretário {{ Auth::user()->name }}</h1>

</section>

@endsection