@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')
<section id="conteudo-dashboard">
<h2>@guest
	<li class="nav-item">
        <a class="nav-link" href="{{ route('user.login') }}">{{ __('Login') }}</a>
    </li>
	@else
		<a>{{ Auth::user()->name }}</a>
@endguest
</h2>

<li><a class="dashboard" href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i> SAIR</a></li>
<h1>Bem Vindo {{ Auth::user()->name }}</h1>

</section>

@endsection