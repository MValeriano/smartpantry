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
            <label for="product_id">Produto:</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="">Selecione o produto</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $product->id == $larder->product_id ? 'selected' : '' }}>
                        {{ $product->product_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Quantidade:</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $larder->quantity }}" required>
        </div>
        <div class="form-group">
            <label for="product_shelf">Data de Validade:</label>
            <input type="date" name="product_shelf" id="product_shelf" class="form-control" value="{{ $larder->product_shelf }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
