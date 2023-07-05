@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
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

        <form action="{{ route('larders.update', $larder->id) }}" method="POST">
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

            <button type="submit" class="btn btn-primary">Atualizar Item</button>
        </form>
    </div>
@endsection
