@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
    <div class="container d-flex justify-content-center">
        <div class="card" style="width: 100rem;">
            <div class="card-body p-5">

                <h2>Editar Produto</h2>
                
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
                
                <div class="card my-3">
                    <div class="card-body">    

                        <form id="formProduto" action="{{ route('products.update', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="product_name">Nome:</label>
                                <input type="text" name="product_name" id="product_name" class="form-control" value="{{ $product->product_name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="product_description">Descrição:</label>
                                <input type="text" name="product_description" id="product_description" class="form-control" value="{{ $product->product_description }}" required>
                            </div>
                            <div class="form-group">
                                <label for="product_weight">Peso:</label>
                                <input type="number" name="product_weight" id="product_weight" class="form-control" value="{{ $product->product_weight }}" required>
                            </div>
                            <div class="form-group">
                                <label for="measurement_units">Unidades de Medida:</label>
                                <input type="text" name="measurement_units" id="measurement_units" class="form-control" value="{{ $product->measurement_units }}" required>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Categoria:</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>     
                    </div>                            
                </div>
                <div class="row">
                            <div class="col">
                                <div class="text-end">
                                    <button type="submit" form="formProduto" class="btn btn-outline-primary">Atualizar Produto</button>
                                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Voltar</a>
                                <div> 
                </div>                       
            </div>
        </div>
    </div>
</div>
@endsection
