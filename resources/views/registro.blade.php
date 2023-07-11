<!DOCTYPE html>
<html>
<head>
  <title>SmartPantry - Registro</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="{{ asset('css/estilosregistro.css') }}" rel="stylesheet"> 
</head>
<body>
  <header class="header">
    <h1 class="app-name">SmartPantry</h1>
    <p class="slogan">Organize, planeje e economize. Simplifique e faça compras de forma inteligente com SmartPantry!</p>
  </header>

    <main class="main-content">
    <div class="row">
      <div class="col">
        @if(session('success'))
            <div class="alert alert-success my-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
          <div class="alert alert-danger my-4" role="alert">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
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
    </div>
    </div>  
  </main>

  <footer class="footer">
    <p>© 2023 SmartPantry. Todos os direitos reservados. </p>
  </footer>
</body>
</html>
