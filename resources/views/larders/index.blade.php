@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
    <h2>Despensa</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('larders.create') }}" class="btn btn-primary">Adicionar Item</a>

    @if (count($larderItems) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Data de Validade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($larderItems as $larderItem)
                    <tr>
                        <td>{{ $larderItem->id }}</td>
                        <td>{{ $larderItem->product->product_name }}</td>
                        <td>{{ $larderItem->quantity }}</td>
                        <td>{{ $larderItem->product_shelf }}</td>
                        <td>
                            <a href="{{ route('larders.edit', $larderItem->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('larders.destroy', $larderItem->id) }}" method="POST" style="display: inline-block;">
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
        <p>Nenhum item na despensa.</p>
    @endif
</div>
@endsection
