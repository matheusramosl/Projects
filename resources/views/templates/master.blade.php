<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Escola de Musica</title>
	@yield('css-view')
	<link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

	
</head>
<body>
	@include('templates.menu_lateral')

	<section id="view-conteudo">
	@yield('conteudo-view')
	</section>

	@yield('js-view')
</body>
</html>