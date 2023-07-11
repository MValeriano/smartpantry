<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="{{ asset('css/estiloslandingpage.css') }}" rel="stylesheet"> 
  <title>SmartPantry - Organize, planeje e economize.</title>

</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('images/logoSmartPantry.jpg') }}" alt="SmartPantry Logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#benefits">Benefícios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#features">Funcionalidades</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#plans">Planos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#partners">Parceiros</a>
          </li>
        </ul>
        <a class="btn btn-primary mr-2" href="{{ route('login') }}">Login</a>
        <a class="btn btn-secondary" href="{{ route('showRegistrationForm') }}">Registrar</a>
      </div>
    </nav>
    <div class="header-content">
      <h1 class="text-center text-white">SmartPantry</h1>
      <p class="text-center text-white">Organize, planeje e economize. Simplifique e faça compras de forma inteligente com SmartPantry</p>
    </div>
  </header>

	<section id="benefits" class="section">
	  <div class="container">

		<div class="row">
		  <div class="col-md-5">
			<img src="{{ asset('images/img01.jpg') }}" alt="Benefício 1">
		  </div>
		  <div class="col-md-7 d-flex align-items-center">
			<p class="p-3 text-dark rounded">Não esqueça nenhum item e não compre mais do que necessita. O SmartPantry te ajuda a economizar tempo e dinheiro.</p>          
		  </div>
		</div>

		<div class="row mt-4">
		  <div class="col-md-6 d-flex align-items-center">
			<p class="p-3 text-dark rounded">O inventário da despensa permite que você acompanhe o que tem em casa, como especiarias e itens essenciais, para que você sempre saiba o que falta.</p>
		  </div>
		  <div class="col-md-6">
			<img src="{{ asset('images/img03.jpg') }}" alt="Benefício 2">
		  </div>
		</div>

		<div class="row">
		  <div class="col-md-5">
			<img src="{{ asset('images/img02.jpg') }}" alt="Benefício 3">
		  </div>
		  <div class="col-md-7 d-flex align-items-center">
			<p class="p-3 text-dark rounded">Com o SmartPantry, sua lista de compras está sempre com você, em qualquer lugar e a qualquer momento.</p>
		  </div>
		</div>

	  </div>
	</section>

	<section id="features" class="section">
	  <div class="container">
		<div class="row">
		  <div class="col-md-6">
			<div class="d-flex align-items-center justify-content-center h-100">
			  <img src="{{ asset('images/cashier-register-concept-vetor.jpg') }}" alt="Imagem de Funcionalidades" class="img-fluid">
			</div>
		  </div>
		  <div class="col-md-6">
			<h2 class="text-center py-5">Funcionalidades do SmartPantry</h2>
			<ul class="list-group">
			  <li class="list-group-item">Organizar as compras e a despensa da casa, levando a economia de tempo e dinheiro</li>
			  <li class="list-group-item">O SmartPantry oferecerá ao usuário a criação de listas de supermercado e controle de despensa</li>
			  <li class="list-group-item">Módulo de receitas que irá verificar os itens da despensa e informar quais receitas podem ser feitas</li>
			  <li class="list-group-item">Leitura de código de barras para o cadastro dos produtos</li>
			  <li class="list-group-item">Relatórios para acompanhamento de despesas, comparação de preços e indicação de locais onde os produtos estão mais baratos</li>
			  <li class="list-group-item">Sistema de ranking para produtos "novos" serem indicados para outros usuários</li>
			  <li class="list-group-item">Compartilhamento das listas com outras pessoas</li>
			</ul>
		  </div>
		</div>
	  </div>
	</section>

	<section id="plans" class="section bg-light">
	  <div class="container py-5">
		<h2 class="text-center custom-title">Planos do SmartPantry</h2>
		<div class="row  d-flex align-items-center justify-content-center" style="height: 100vh;">	
		  <div class="col-md-4">
			<div class="card">
			  <div class="card-header">
				<h3 class="text-center">Basic</h3>
			  </div>
			  <div class="card-body">
				<div class="price">
				  <div class="price-column">
					<span class="price-value">00</span>
				  </div>
				  <div class="price-column">
					<div class="price-currency">BRL</div>
					<div class="price-duration">por mês</div>
				  </div>
				</div>
				<p class="card-description">Adicione uma descrição da sua oferta e benefícios-chave</p>
				<ul class="benefits">
				  <li>Benefício No. 1</li>
				  <li>Benefício No. 2</li>
				  <li>Benefício No. 3</li>
				</ul>
				<a href="#" class="btn btn-primary btn-block">Escolher</a>
			  </div>
			</div>
		  </div>
		  
		  <div class="col-md-4">
			<div class="card">
			  <div class="card-header">
				<h3 class="text-center">Pró</h3>
			  </div>
			  <div class="card-body">
				<div class="price">
				  <div class="price-column">
					<span class="price-value">29</span>
				  </div>
				  <div class="price-column">
					<div class="price-currency">BRL</div>
					<div class="price-duration">por mês</div>
				  </div>
				</div>
				<p class="card-description">Adicione uma descrição da sua oferta e benefícios-chave</p>
				<ul class="benefits">
				  <li>Benefício No. 1</li>
				  <li>Benefício No. 2</li>
				  <li>Benefício No. 3</li>
				</ul>
				<a href="#" class="btn btn-primary btn-block">Escolher</a>
			  </div>
			</div>
		  </div>
		  
		  <div class="col-md-4">
			<div class="card">
			  <div class="card-header">
				<h3 class="text-center">Advanced</h3>
			  </div>
			  <div class="card-body">
				<div class="price">
				  <div class="price-column">
					<span class="price-value">49</span>
				  </div>
				  <div class="price-column">
					<div class="price-currency">BRL</div>
					<div class="price-duration">por mês</div>
				  </div>
				</div>
				<p class="card-description">Adicione uma descrição da sua oferta e benefícios-chave</p>
				<ul class="benefits">
				  <li>Benefício No. 1</li>
				  <li>Benefício No. 2</li>
				  <li>Benefício No. 3</li>
				</ul>
				<a href="#" class="btn btn-primary btn-block">Escolher</a>
			  </div>
			</div>
		  </div>
		  
		</div>
	  </div>
	</section>

	<section id="partners" class="section">
	  <div class="container">
		<h2 class="text-center py-5 ">Nossos Parceiros</h2>
		<div class="row text-center">
		  <div class="col-md-12">
			<div class="partners">
			  <img src="{{ asset('images/logoepa.png') }}" alt="Parceiro 1">
			  <img src="{{ asset('images/logobh.png') }}" alt="Parceiro 2">
			  <img src="{{ asset('images/logoabc.png') }}" alt="Parceiro 3">
			  <img src="{{ asset('images/logomineirao.png') }}" alt="Parceiro 4">
			  <img src="{{ asset('images/logoapoio.png') }}" alt="Parceiro 5">
			  <img src="{{ asset('images/logodia.png') }}" alt="Parceiro 6">
			</div>
		  </div>
		</div>
		<div class="row mt-5">
		  <div class="col-md-12 py-5">
			<h2 class="text-center">O que falam de nós</h2>
		  </div>
		</div>
		<div class="row">
		  <div class="col-md-12">
			<div class="card-deck">
			  <div class="card">
				<div class="card-body">
				  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus commodo mi ac tellus congue, eu facilisis nunc commodo.</p>
				  <p class="card-text"><strong>Cliente 1</strong></p>
				</div>
			  </div>
			  <div class="card">
				<div class="card-body">
				  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus commodo mi ac tellus congue, eu facilisis nunc commodo.</p>
				  <p class="card-text"><strong>Cliente 2</strong></p>
				</div>
			  </div>
			  <div class="card">
				<div class="card-body">
				  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus commodo mi ac tellus congue, eu facilisis nunc commodo.</p>
				  <p class="card-text"><strong>Cliente 3</strong></p>
				</div>
			  </div>
			  <div class="card">
				<div class="card-body">
				  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus commodo mi ac tellus congue, eu facilisis nunc commodo.</p>
				  <p class="card-text"><strong>Cliente 4</strong></p>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</section>



	<section id="downloads" class="section bg-light">
	  <div class="container">
		<div class="row">
		  <div class="col-md-12">
			<h2 class="text-center">Faça o Download do SmartPantry</h2>
			<p class="text-center about-us">
			  Bem-vindo a SmartPantry. Somos uma equipe dedicada de profissionais que estão empenhados em ajudar nossos clientes a atingir seus objetivos. Nosso objetivo é fornecer serviços de alta qualidade e soluções personalizadas para atender às necessidades de cada cliente.
			</p>
			<p class="text-center about-us">
			  Vendas online estão se tornando cada vez mais importantes para as empresas de hoje. Com o aumento do número de compradores online, é essencial que as empresas tenham uma presença forte na internet para aproveitar ao máximo as oportunidades de vendas disponíveis. É por isso que oferecemos soluções de comércio eletrônico personalizadas para ajudar nossos clientes a aumentar suas vendas online.
			</p>
			<p class="text-center about-us">
			  Nós entendemos que cada empresa tem necessidades únicas e desafios específicos em relação às vendas online. É por isso que trabalhamos em estreita colaboração com nossos clientes para fornecer soluções personalizadas que atendam às suas necessidades específicas. Seja você um pequeno varejista ou uma grande empresa de comércio eletrônico, estamos aqui para ajudá-lo a alcançar seus objetivos de vendas online.
			</p>
			<p class="text-center about-us">
			  Com nossa experiência e conhecimento em vendas online, podemos ajudá-lo a desenvolver uma estratégia de comércio eletrônico eficaz que aumentará suas vendas e sua presença na internet. Nós oferecemos uma variedade de serviços, desde a criação de lojas online até o gerenciamento de campanhas de marketing digital, para ajudar nossos clientes a alcançar o sucesso em vendas online. Entre em contato conosco hoje para saber como podemos ajudar sua empresa a ter sucesso nas vendas online.
			</p>
		  </div>
		</div>
		<div class="row">
		  <div class="col-md-6 text-center">
			<a href="#" class="download-link">
			  <img src="{{ asset('images/googleplay.png') }}" alt="Download no Google Play" class="download-img">
			</a>
		  </div>
		  <div class="col-md-6 text-center">
			<a href="#" class="download-link">
			  <img src="{{ asset('images/appstore.png') }}" alt="Download na App Store" class="download-img">
			</a>
		  </div>
		</div>
	  </div>
	</section>


  <footer class="text-center">
    <p>&copy; 2023 SmartPantry. Todos os direitos reservados.</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
