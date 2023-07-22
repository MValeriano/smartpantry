@extends('home')

@section('content')
    <div class="col-lg-10 col-md-9 content">
        <div class="container d-flex justify-content-center">
            <div class="card" style="width: 100rem;">
                <div class="card-body p-5">

                    <div class="col-lg-10 col-md-9 content">
                        <h1>Produtos do Parceiro : {{ $emporium->name }}</h1>

                        <div class="card mt-3"> 
                            <div class="card-body">   
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Descrição</th>
                                            <th>Peso</th>
                                            <th></th>
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
                            </div>
                        </div>
                        
                        <div class="mt-2">
                            <div class="text-end my-1">
                                <a href="{{ route('EmporiumProduct.create', ['emporium' => $emporium->id]) }}" class="btn btn-outline-primary">Adicionar Produto</a>
                                <a href="{{ route('EmporiumProduct.index') }}" class="btn btn-outline-secondary">
                                    Cancelar
                                </a>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                
    </div>
@endsection