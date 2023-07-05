@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
    <div class="container d-flex justify-content-center">
        <div class="card">
            <div class="card-body p-5">
                
                <h1>Concluir Lista de Compras</h1>
                <p><strong>Nome da Lista:</strong> {{ $supermarketList->list_name }}</p>
                <p><strong>Data de Criação da lista:</strong> {{ $supermarketList->created_at }}</p>

                <h2>Produtos</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card my-3">
                    <div class="card-body"> 

                    <form id="formLista" action="{{ route('supermarket_lists.update', $supermarketList) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <table class="table table-striped table-small table-hover table-fixed">
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Valor do Item</th>
                                    <th>Quantidade</th>
                                    <th>Data do vencimento</th>
                                    <th>Comprado?</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supermarketList->products as $product)
                                    <tr>
                                        <td>{{ $product->product_name }}</td>
                                        <td>
                                            <input type="text" name="product_values[]" placeholder="Valor do Item" required>
                                        </td>
                                        <td>
                                            <input type="number" name="product_quantity[]"required>
                                        </td>                                        
                                        <td>
                                            <input type="date" name="product_expiration_date[]" placeholder="Data do vencimento" required>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" name="product_purchased[]" value="{{ $product->id }}">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>

                    </div>
                </div>                                  
                <div class="row">
                    <div class="col">
                        <div class="text-end">
                            <a href="{{ route('supermarket_lists.index') }}" class="btn btn-secondary">Voltar</a>
                            <button type="submit" form="formLista" class="btn btn-primary">Salvar</button>  
                        </div>                              
                    <div> 
                </div>                          
            </div>
        </div>
    </div>
    <script>
        function exportToPdf() {
            window.location.href = "{{ route('supermarket_lists.imprimepdf', $supermarketList) }}";
        }
    </script>
</div>
@endsection