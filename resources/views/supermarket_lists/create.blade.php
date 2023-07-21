@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
    <div class="container d-flex justify-content-center">
        <div class="card">
            <div class="card-body p-5">
                <h1 class="pb-5">Criar Lista de Compras</h1>

                @if ($errors->any())
                <div class="alert alert-danger p-4">
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

                <form method="POST" action="{{ route('supermarket_lists.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group pb-3">
                                <label for="list_name">Nome da Lista</label>
                                <input type="text" class="form-control" id="list_name" name="list_name" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-9">
                            <div class="form-group pb-3">
                                <label for="product">Produto</label>
                                <input type="text" list="products" class="form-control" id="product">
                                <datalist id="products">
                                    @foreach ($products as $product)
                                        <option value="{{ $product->product_name }}">{{ $product->product_name }}</option>
                                    @endforeach
                                </datalist>
                            </div>
                        </div>                    

                        <div class="col-3">
                            <div class="form-group pb-3">
                                <label for="product_quantity">Quantidade</label>
                                <input type="number" class="form-control" id="product_quantity">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary my-3" id="add_product">Adicionar Produto à Lista</button>

                    <div class="card mb-3">
                        <div class="card-body">
                            <table class="table table-striped table-small table-hover table-fixed">
                                <thead>
                                    <tr>
                                        <th>Produto</th>
                                        <th>Quantidade</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="product_table_body">
                                </tbody>
                            </table>      
                        </div>                         
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary mt-4">Criar Lista de Compras</button>
                            <button type="reset" class="btn btn-secondary mt-4">Limpar</button>
                            <a href="{{ route('supermarket_lists.index') }}" class="btn btn-secondary mt-4">Voltar</a>
                        </div>
                    </div>   
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {            
            const addProductButton = document.getElementById('add_product');
            const productInput = document.getElementById('product');
            const quantityInput = document.getElementById('product_quantity');
            const productTableBody = document.getElementById('product_table_body');

            const products = {!! json_encode($products) !!};

            addProductButton.addEventListener('click', function () {
                
                const productName = productInput.value;
                const productId = getProductByName(productName).id;
                const quantity = quantityInput.value;

                const row = document.createElement('tr');
                row.innerHTML = `
                <tr class="product-row">
                    <td>${productName}</td>
                    <td>${quantity}</td>
                    <td>
                        <input type="hidden" name="product_id[]" value="${productId}">
                        <input type="hidden" name="product_quantity[]" value="${quantity}">
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeProduct(this)">Remover</button>
                    </td>
                </tr>
                `;

                productTableBody.appendChild(row);

                productInput.value = '';
                quantityInput.value = '';
            });

            function getProductByName(productName) {
                return products.find(product => product.product_name === productName);
            }
        });

        function removeProduct(button) {
                button.closest('tr').remove();
        };

    </script>
</div>
@endsection
