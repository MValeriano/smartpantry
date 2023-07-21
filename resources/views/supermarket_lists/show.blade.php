@extends('home')

@section('content')
    <div class="col-lg-10 col-md-9 content">
        <div class="container d-flex justify-content-center">
            <div class="card" style="width: 100rem;">
                <div class="card-body p-5">
                    <h1>Detalhes da Lista de Compras</h1>

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

                    <div class="card mt-3"> 
                        <div class="card-body">                              
                            <p><strong>Nome da Lista : </strong>{{ $supermarketList->list_name }} </p>
                            <p><strong>Data de Criação : </strong> {{ $supermarketList->created_at }}</p>

                            <h2>Produtos:</h2>
                            <ul class="list-group">
                                @foreach ($supermarketList->products as $product)
                                    <li class="list-group-item">{{ $product->product_name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    <div class="card-footer">
                        <div class="text-end my-4">
                            <button onclick="exportToPdf()">Exportar para PDF</button>
                            <button class="mx-2" disabled>Compartilhar Lista</button>
                            <button onclick="concludeList()">Concluir Lista</button>
                        </div>
                    </div>


                    <script>
                        function exportToPdf() {
                            window.location.href = "{{ route('supermarket_lists.imprimepdf', $supermarketList) }}";
                        }

                        function concludeList() {
                            window.location.href = "{{ route('supermarket_lists.conclude', $supermarketList) }}";
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>
@endsection
