@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
    <div class="container">
        <h1>Criar Lista de Compras</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('supermarket_lists.store') }}">
            @csrf

            <div class="form-group">
                <label for="list_name">Nome da Lista</label>
                <input type="text" class="form-control" id="list_name" name="list_name" required>
            </div>

            <div class="form-group">
                <label for="product">Produto</label>
                <input type="text" list="products" class="form-control" id="product">
                <datalist id="products">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                    @endforeach
                </datalist>
            </div>

            <div class="form-group">
                <label for="product_quantity">Quantidade</label>
                <input type="number" class="form-control" id="product_quantity">
            </div>

            <button type="button" class="btn btn-primary" id="add_product">Adicionar Produto à Lista</button>

            <hr>

            <table class="table">
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

            <button type="submit" class="btn btn-primary">Criar Lista de Compras</button>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const addProductButton = document.getElementById('add_product');
            const productInput = document.getElementById('product');
            const quantityInput = document.getElementById('product_quantity');
            const productTableBody = document.getElementById('product_table_body');

            const products = {!! json_encode($products) !!};

            addProductButton.addEventListener('click', function () {
                const productId = productInput.value;
                const productName = getProductById(productId).product_name;
                const quantity = quantityInput.value;

                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${productName}</td>
                    <td>${quantity}</td>
                    <td>
                        <input type="hidden" name="product_id[]" value="${productId}">
                        <input type="hidden" name="product_quantity[]" value="${quantity}">
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeProduct(this)">Remover</button>
                    </td>
                `;

                productTableBody.appendChild(row);

                productInput.value = '';
                quantityInput.value = '';
            });

            function getProductById(productId) {
                return products.find(product => product.id === parseInt(productId));
            }

            function removeProduct(button) {
                button.closest('tr').remove();
            }
        });
    </script>
</div>
@endsection
