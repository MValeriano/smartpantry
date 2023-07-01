<!DOCTYPE html>
<html>
<head>
  <title>SmartPantry - Registro</title>
  <link href="{{ asset('css/estilosregistro.css') }}" rel="stylesheet"> 
</head>
<body>
  <header class="header">
    <h1 class="app-name">SmartPantry</h1>
    <p class="slogan">Organize, planeje e economize. Simplifique e faça compras de forma inteligente com SmartPantry!</p>
  </header>

  <main class="main-content">
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <div id="center-content">
      <form class="register-form" action="{{ route('register') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Senha" required>
        <button type="submit" class="register-button">Registrar</button>
      </form>

      <p class="login-link">Já possui uma conta? <a href="{{ route('login') }}">Faça login</a></p>
    </div>
  </main>

  <footer class="footer">
    <p>© 2023 SmartPantry. Todos os direitos reservados.</p>
  </footer>
</body>
</html>
