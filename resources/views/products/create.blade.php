@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
    <h1>Criar Novo Produto</h1>
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="form-group pb-4">
                    <label for="product_name">Nome:</label>
                    <input type="text" name="product_name" id="product_name" class="form-control" required>
                </div>
                <div class="form-group pb-4">
                    <label for="product_description">Descrição:</label>
                    <input type="text" name="product_description" id="product_description" class="form-control" required>
                </div>
                <div class="form-group pb-4">
                    <label for="product_weight">Peso:</label>
                    <input type="number" name="product_weight" id="product_weight" class="form-control" required>
                </div>
                <div class="form-group pb-4">
                    <label for="measurement_units">Unidades de Medida:</label>
                    <input type="text" name="measurement_units" id="measurement_units" class="form-control" required>
                </div>
                <div class="form-group pb-4">
                    <label for="category_id">Categoria:</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary my-3">Criar Produto</button>
            </form>
        </div>
    </div>

</div>
@endsection
