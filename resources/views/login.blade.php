<!DOCTYPE html>
<html>
<head>
  <title>SmartPantry - Login</title>
  <link href="{{ asset('css/estiloslogin.css') }}" rel="stylesheet"> 
</head>
<body>
  <header class="header">
    <h1 class="app-name">SmartPantry</h1>
    <p class="slogan">Organize, planeje e economize. Simplifique e faça compras de forma inteligente com SmartPantry!</p>
  </header>

  <main class="main-content">
	<div id="center-content">
    <form class="login-form" action="{{ route('login') }}" method="post">
      @csrf
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Senha" required>
      <button type="submit" class="login-button">Entrar</button>
    </form>

    <p class="register-link">Ainda não possui uma conta? <a href="{{ route('register') }}">Registre-se</a></p>
    
    
    <div class="oauth-section">
      <p>Ou faça login com:</p>
      <div class="oauth-buttons">        
        <a href="{{ route('oauth.redirect', ['provider' => 'google']) }}" class="oauth-button google">Google</a>        
        <a href="{{ route('oauth.redirect', ['provider' => 'github']) }}" class="oauth-button github">Github</a>
      </div>
    </div>
    
	</div>
  </main>

  <footer class="footer">
    <p>© 2023 SmartPantry. Todos os direitos reservados.</p>
  </footer>
</body>
</html>
