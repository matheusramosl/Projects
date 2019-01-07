<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Escola de Musica</title>
	@yield('css-view')
	<link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">

</head>
<body>
	<section id="content-cadastrar" class="login">
		<h1>Cadastro</h1>
		 <a href="{{ route('user.dashboard') }}">
            <h4>Voltar ao menu</h4>           
        </a>
	</section>
	@yield('conteudo-cadastro')
	@yield('js-view')
</body>
</html>