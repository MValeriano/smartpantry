@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
    <div class="card mb-4">
        <div class="card-header">Adicionar Produto ao Parceiro</div>        
        <div class="card-body">
            <form action="{{ route('EmporiumProduct.store') }}" method="POST">
                @csrf
                <input type="hidden" name="emporium_id" value="{{ $emporium->id }}">
                <div class="form-group">    
                    <label for="product_id">Selecione um produto:</label>
                    <select name="product_id" id="product_id" class="form-control">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Adicionar Produto</button>
            </form>
        </div>
    </div> 
</div>
@endsection
