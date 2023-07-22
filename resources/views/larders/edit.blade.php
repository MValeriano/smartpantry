@extends('home')

@section('content')
    <div class="col-lg-10 col-md-9 content">
        <div class="container d-flex justify-content-center">
            <div class="card" style="width: 100rem;">
                <div class="card-body p-5">    

                    <h2>Editar Item da Despensa</h2>

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

                            <form id="form" action="{{ route('larders.update', $larder->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="product_id">Produto</label>
                                    <select class="form-control" name="product_id" id="product_id" required>
                                        <option value="">Selecione um produto</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}" @if ($product->id == $larder->products->first()->id) selected @endif>{{ $product->product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="quantity">Quantidade</label>
                                    <input type="number" class="form-control" name="quantity" id="quantity" value="{{ $larder->products->first()->pivot->quantity }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="expiration_date">Data de Validade</label>
                                    <input type="date" class="form-control" name="expiration_date" id="expiration_date" value="{{ $larder->products->first()->pivot->expiration_date }}" required>
                                </div>

                            </form>
                        </div>
                    </div>        
                    <div class="text-end mt-4">
                        <button form="form" type="submit" class="btn btn-outline-primary">Atualizar Item</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
