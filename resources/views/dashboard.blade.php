@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">

    <div class="row">
        <div class="col-lg-3 col-md-6 py-3">
            <div class="card shadow border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="mr-3">
                        <span class="icon text-danger d-flex align-items-center justify-content-center">
                            <i class="fas fa-exclamation-circle fa-3x"></i></span>
                    </div>
                    <div>
                        <h6 class="card-title">Produtos Prestes a Vencer </h6>
                        <h3 class="card-value text-center display-4">{{ $Produtosavencer }}</h3>
                    </div>
                </div>
            </div>
        </div>        
        
        <div class="col-lg-3 col-md-6 py-3">
            <div class="card shadow border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="mr-3">
                        <span class="icon text-warning d-flex align-items-center justify-content-center"><i class="fas fa-exclamation-triangle fa-3x"></i></span>
                    </div>
                    <div>
                        <h6 class="card-title">Produtos perto do fim</h6>
                        <h3 class="card-value text-center display-4">{{ $Productspertofim }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 py-3">
            <div class="card shadow border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="mr-3">
                        <span class="icon text-success d-flex align-items-center justify-content-center">
                            <i class="fas fa-list-alt fa-3x"></i></span>
                    </div>
                    <div>
                        <h6 class="card-title">Produtos Cadastrados</h6>
                        <h3 class="card-value text-center display-4">{{ $totalProducts }}</h3>
                    </div>
                </div>
            </div>
        </div>        

        <div class="col-lg-3 col-md-6 py-3">
            <div class="card shadow border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="mr-3">
                        <span class="icon text-primary d-flex align-items-center justify-content-center">
                            <i class="fas fa-tags fa-3x"></i></span>
                    </div>
                    <div>
                        <h6 class="card-title">Total de Categorias</h6>
                        <h3 class="card-value text-center display-4">{{ $totalCategories }}</h3>
                    </div>
                </div>
            </div>
        </div>        

        <div class="col-lg-3 col-md-6 py-3">
            <div class="card shadow border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="mr-3">
                        <span class="icon text-secondary d-flex align-items-left justify-content-left">
                            <i class="fas fa-clipboard-list fa-3x"></i></span>
                    </div>
                    <div>
                        <h6 class="card-title">Itens na Despensa</h6>
                        <h3 class="card-value text-center display-4">{{ $itemsDespensa }}</h3>
                    </div>
                </div>
            </div>
        </div>                
        
        <div class="col-lg-6">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h5 class="card-title">Gráfico de Compras</h5>
                    <canvas id="chartCompras"></canvas>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h5 class="card-title">Produtos por Categoria</h5>
                    <canvas id="chartProdutosCategoria"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
<script>
    var ctxCompras = document.getElementById('chartCompras').getContext('2d');
    var chartCompras = new Chart(ctxCompras, {
        type: 'line',
        data: {
            labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
            datasets: [{
                label: 'Compras',
                data: [1500, 2000, 1800, 2200, 2500, 2300],
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.4
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    
    var ctxProdutosCategoria = document.getElementById('chartProdutosCategoria').getContext('2d');
    var chartProdutosCategoria = new Chart(ctxProdutosCategoria, {
        type: 'pie',
        data: {
            labels: {!! json_encode($categoryNames) !!},
            datasets: [{
                label: 'Quantidade',
                data: {!! json_encode($categoryQuantities) !!},
                backgroundColor: {!! json_encode($categoryColors) !!},
                borderColor: 'rgba(0, 0, 0, 0.2)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });
</script>

@endsection
