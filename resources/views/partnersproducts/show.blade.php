@extends('home')

@section('content')
    <div class="col-lg-10 col-md-9 content">
        <h1>Produtos do Parceiro: {{ $emporium->name }}</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Peso</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emporium->products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->product_description }}</td>
                        <td>{{ $product->product_weight }} {{ $product->measurement_units }}</td>
                        <td>
                            <a href="{{ route('EmporiumProduct.edit', ['emporium' => $emporium->id, 'product' => $product->id]) }}" class="btn btn-outline-primary">Editar</a>
                            <form action="{{ route('EmporiumProduct.destroy', ['emporium' => $emporium->id, 'product' => $product->id]) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('EmporiumProduct.create', ['emporium' => $emporium->id]) }}" class="btn btn-outline-primary">Adicionar Produto</a>
    </div>
@endsection