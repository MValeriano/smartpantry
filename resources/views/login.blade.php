<!DOCTYPE html>
<html>
<head>
  <title>SmartPantry - Login</title>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
  <link href="{{ asset('css/estiloslogin.css') }}" rel="stylesheet"> 
</head>
<body>
  <header class="header">
    <h1 class="app-name">SmartPantry</h1>
    <p class="slogan">Organize, planeje e economize. Simplifique e faça compras de forma inteligente com SmartPantry!</p>
  </header>

  <main class="main-content">
	<div id="center-content">
    @if ($errors->any())
      <div class="alert alert-danger mt-4" role="alert">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
     @endif
    <form class="login-form" action="{{ route('login') }}" method="post">
      @csrf
      <input class="form-control form-control-lg" type="email" name="email" placeholder="Email" required>
      <input class="form-control form-control-lg" type="password" name="password" placeholder="Senha" required>
      <button type="submit" class="login-button">Entrar</button>
    </form>    
    
    <div class="oauth-section">
      <p class="my-3 font-monospace text-muted">Ou faça login com:</p>
      <div class="oauth-buttons">        
        <button type="button" onclick="window.location.href='{{ route('oauth.redirect', ['provider' => 'google']) }}'" class="oauth-button google btn btn-danger btn-google d-block">
          <i class="fab fa-google"></i> Google
        </button>        
        <button type="button" onclick="window.location.href='{{ route('oauth.redirect', ['provider' => 'github']) }}'" class="oauth-button github btn btn-dark btn-github d-block">
          <i class="fab fa-github"></i> Github
        </button>
      </div>
    </div>
    <p class="register-link my-3 font-monospace text-muted">Ainda não possui uma conta? <a class="text-reset text-decoration-underline" href="{{ route('showRegistrationForm') }}"><strong>Registre-se</strong></a></p>


	</div>
  </main>

  <footer class="footer">
    <p>© 2023 SmartPantry. Todos os direitos reservados.</p>
  </footer>
</body>
</html>
