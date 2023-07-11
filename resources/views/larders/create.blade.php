@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
        <h2>Adicionar Item à Despensa</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('larders.store') }}" method="POST">
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

            <button type="submit" class="btn btn-primary">Adicionar Item</button>
        </form>
    </div>
@endsection
