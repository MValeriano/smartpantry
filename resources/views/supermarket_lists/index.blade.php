@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
    <h1>Listas de Compras</h1>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <a href="{{ route('supermarket_lists.create') }}" class="btn btn-primary">Criar Nova Lista de Compras</a>
    
    @if (count($supermarketLists) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Total</th>
                    <th>Comprado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($supermarketLists as $supermarketList)
                    <tr>
                        <td>{{ $supermarketList->product->name }}</td>
                        <td>{{ $supermarketList->product_quantity }}</td>
                        <td>{{ $supermarketList->supermarket_list_price }}</td>
                        <td>{{ $supermarketList->supermarket_list_price_total }}</td>
                        <td>{{ $supermarketList->purchased ? 'Sim' : 'Não' }}</td>
                        <td>
                            <a href="{{ route('supermarket_lists.edit', $supermarketList->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('supermarket_lists.destroy', $supermarketList->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nenhuma lista de compras encontrada.</p>
    @endif
</div>
@endsection
