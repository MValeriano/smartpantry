@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
    <div class="container">
        <h2>Editar Lista de Compras</h2>
        <form action="{{ route('supermarket_lists.update', $supermarketList->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="list_name">Nome da Lista:</label>
                <input type="text" name="list_name" class="form-control" value="{{ $supermarketList->list_name }}" required>
            </div>
            <h4>Produtos:</h4>
            <div class="form-group">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Comprado?</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->product_name }}</td>
                                <td>
                                    <input type="number" name="products[{{ $product->id }}][product_quantity]" class="form-control" value="{{ $supermarketList->products->find($product->id)->pivot->product_quantity }}" min="1" required>
                                </td>
                                <td>
                                    <input type="number" name="products[{{ $product->id }}][supermarket_list_products_price]" class="form-control" value="{{ $supermarketList->products->find($product->id)->pivot->supermarket_list_products_price }}" min="0" step="0.01" required>
                                </td>
                                <td>
                                    <input type="checkbox" name="products[{{ $product->id }}][purchased]" value="1" {{ $supermarketList->products->find($product->id)->pivot->purchased ? 'checked' : '' }}>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-outline-primary">Atualizar Lista</button>
        </form>
    </div>
</div>
@endsection
