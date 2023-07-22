@extends('home')

@section('content')
    <div class="col-lg-10 col-md-9 content">
        <div class="container d-flex justify-content-center">
            <div class="card" style="width: 100rem;">
                <div class="card-body p-5">

                    <h2>Adicionar Item à sua Despensa</h2>

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
                            <form id="form" action="{{ route('larders.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="product_id">Produto</label>
                                            <select class="form-control" id="product_id">
                                                <option value="">Selecione um produto</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="quantity">Quantidade</label>
                                            <input type="number" class="form-control" id="quantity">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="expiration_date">Data de Validade</label>
                                            <input type="date" class="form-control" id="expiration_date">
                                        </div>
                                    </div>

                                    <div class="col-md-2 d-flex justify-content-center align-items-end">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-outline-info" id="add_product">Adicionar Item</button>
                                        </div>
                                    </div>                     
                                </div>     
                                <table id="item_table" class="table table-striped table-small table-hover table-fixed">
                                    <thead>
                                        <tr>
                                            <th>Produto</th>
                                            <th>Quantidade</th>
                                            <th>Data de Validade</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody id="product_table_body">
                                    </tbody>
                                </table> 
                        </div>                         
                    </div>            
                </form>         

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group text-end">
                                <button form="form" id="btn_enviar" type="submit" class="btn btn-outline-primary">Enviar para a despensa</button>
                                <button type="reset" class="btn btn-outline-secondary">Limpar</button>
                                <a href="{{ route('larders.index') }}" class="btn btn-outline-secondary">Voltar</a>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {            
                const addProductButton = document.getElementById('add_product');
                const productInput = document.getElementById('product_id');
                const quantityInput = document.getElementById('quantity');
                const expirationDateInput = document.getElementById('expiration_date');
                const productTableBody = document.getElementById('product_table_body');

                const products = {!! json_encode($products) !!};

                addProductButton.addEventListener('click', function () {
                    
                    const productName = productInput.options[productInput.selectedIndex].text;
                    const quantity = quantityInput.value;
                    const expirationDate = expirationDateInput.value;

                    const row = document.createElement('tr');
                    row.innerHTML = `
                    <tr class="product-row">
                        <td>${productName}</td>
                        <td>${quantity}</td>
                        <td>${expirationDate}</td>
                        <td>
                            <input type="hidden" name="product_id[]" value="${productInput.value}">
                            <input type="hidden" name="product_name[]" value="${productName}">
                            <input type="hidden" name="quantity[]" value="${quantity}">
                            <input type="hidden" name="expiration_date[]" value="${expirationDate}">
                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="removeProduct(this)">Remover</button>
                        </td>
                    </tr>
                    `;

                    productTableBody.appendChild(row);

                    productInput.selectedIndex = 0;
                    quantityInput.value = '';
                    expirationDateInput.value = '';

                    updateTableVisibility();  
                });

                function getProductByName(productName) {
                    return products.find(product => product.product_name === productName);
                }

                function updateTableVisibility() {
                    const itemTable = document.getElementById('item_table');
                    const btnEnviar = document.getElementById('btn_enviar');
                    const itemsExist = itemTable.getElementsByTagName('td').length > 0;                    
                    
                    if (itemsExist) {
                        itemTable.style.display = 'table';
                        btnEnviar.disabled = false;
                    } else {
                        itemTable.style.display = 'none';
                        btnEnviar.disabled = true;
                    }
                }

                updateTableVisibility();                
            });

            function removeProduct(button) {
                    button.closest('tr').remove();
            };
        </script>
    </div>
@endsection
