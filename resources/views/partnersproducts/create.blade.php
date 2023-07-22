@extends('home')

@section('content')
    <div class="col-lg-10 col-md-9 content">
        <div class="container d-flex justify-content-center">
            <div class="card" style="width: 100rem;">
                <div class="card-body p-5">

                    <h1>Adicionar Produto ao Parceiro</h1>

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

                    <div class="card mb-4">
                        <div class="card-header">Selecione um produto:</div>        
                        <div class="card-body">
                            <form id="form" action="{{ route('EmporiumProduct.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="emporium_id" value="{{ $emporium->id }}">

                                <div class="row">
                                    <div class="col-9">
                                        <div class="form-group">    
                                            <select name="product_id" id="product_id" class="form-control">
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="text-start">
                                            <button type="button" class="btn btn-outline-info" onclick="addProduct()">Adicionar Produto</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">Produtos Adicionados:</div>        
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Produto</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="productTableBody">
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="text-end my-1">
                            <button form="form" type="submit" class="btn btn-outline-primary">Salvar Produtos</button>
                            <a href="{{ route('EmporiumProduct.index') }}" class="btn btn-outline-secondary">
                                Cancelar
                            </a>                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function addProduct() {
            const productId = document.getElementById('product_id').value;
            const productName = document.getElementById('product_id').options[document.getElementById('product_id').selectedIndex].text;

            if (document.getElementById(`product-${productId}`)) {
                alert('Este produto já foi adicionado.');
                return;
            }

            const newRow = document.createElement('tr');
            newRow.setAttribute('id', `product-${productId}`);
            newRow.innerHTML = `
                <td>${productName}</td>
                <td><button type="button" class="btn btn-danger" onclick="removeProduct(${productId})">Remover</button></td>
            `;

            const tableBody = document.getElementById('productTableBody');
            tableBody.appendChild(newRow);
        }

        function removeProduct(productId) {
            const row = document.getElementById(`product-${productId}`);
            if (row) {
                row.remove();
            }
        }
    </script>
@endsection
