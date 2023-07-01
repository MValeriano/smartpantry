@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
<h1>Concluir Lista de Compras</h1>
    <p><strong>Nome da Lista:</strong> {{ $supermarketList->list_name }}</p>
    <p><strong>Data de Criação:</strong> {{ $supermarketList->created_at }}</p>

    <h2>Produtos:</h2>
    <form action="{{ route('supermarket_lists.update', $supermarketList) }}" method="POST">
        @csrf
        @method('PUT')
        <ul>
            @foreach ($supermarketList->products as $product)
                <li>
                    {{ $product->product_name }}
                    <input type="text" name="product_values[]" placeholder="Valor do Item" required>
                    <input type="checkbox" name="product_purchased[]" value="{{ $product->id }}"> Comprado
                </li>
            @endforeach
        </ul>

        <button onclick="exportToPdf()">Exportar para PDF</button>
        <button type="submit">Salvar</button>
    </form>

    <script>
        function exportToPdf() {
            window.location.href = "{{ route('supermarket_lists.export', $supermarketList) }}";
        }
    </script>
</div>
@endsection