<!DOCTYPE html>

<html>
	<head>	
		<meta charset="utf-8">
		<title>Login | EMADS</title>
		<link rel="stylesheet"  href="{{ asset('css/stylesheet.css') }}">
		<link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	</head>
	<body>
		
		<div class="background"></div>

		<section id="content-view" class="login">
			<h1>Escola de Música</h1>
			<h3>Assembléia de Deus Sobradinho</h3>
            <h3>Login Secretario</h3>

			<div class="card-body">
                    <form method="POST" action="{{ url('/secretario/login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="username" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>	

                            	<a class="login" href="{{ route('auth.register') }}">Cadastrar</a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
			
		</section>

	</body>

</html>
	
