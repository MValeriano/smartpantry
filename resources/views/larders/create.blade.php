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

                                <div class="form-group">
                                    <label for="product_id">Produto</label>
                                    <select class="form-control" name="product_id" id="product_id" required>
                                        <option value="">Selecione um produto</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="quantity">Quantidade</label>
                                    <input type="number" class="form-control" name="quantity" id="quantity" required>
                                </div>

                                <div class="form-group">
                                    <label for="expiration_date">Data de Validade</label>
                                    <input type="date" class="form-control" name="expiration_date" id="expiration_date" required>
                                </div>
                            </form>    
                        </div>   
                    </div> 
                    <div class="text-end mt-4">
                        <button form="form" type="submit" class="btn btn-primary">Adicionar Item</button>
                    </div>                
                </div>
            </div>
        </div>
    </div>
@endsection
