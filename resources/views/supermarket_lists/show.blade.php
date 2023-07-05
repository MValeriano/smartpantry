@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
    <h1>Detalhes da Lista de Compras</h1>
    <p><strong>Nome da Lista:</strong>{{ $supermarketList->list_name }} </p>
    <p><strong>Data de Criação:</strong> {{ $supermarketList->created_at }}</p>

    <h2>Produtos:</h2>
    <ul>
        @foreach ($supermarketList->products as $product)
            <li>{{ $product->product_name }}</li>
        @endforeach
    </ul>

    <button onclick="exportToPdf()">Exportar para PDF</button>
    <button disabled>Compartilhar Lista</button>
    <button onclick="concludeList()">Concluir Lista</button>
    
    <script>
        function exportToPdf() {
            window.location.href = "{{ route('supermarket_lists.imprimepdf', $supermarketList) }}";
        }

        function concludeList() {
            window.location.href = "{{ route('supermarket_lists.conclude', $supermarketList) }}";
        }
    </script>
</div>
@endsection
