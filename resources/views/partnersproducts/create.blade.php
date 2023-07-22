@extends('home')

@section('content')
    <div class="col-lg-10 col-md-9 content">
        <div class="container d-flex justify-content-center">
            <div class="card" style="width: 100rem;">
                <div class="card-body p-5">

                    <h1>Adicionar Produto ao Parceiro</h1>

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

                    <div class="card mb-4">
                        <div class="card-header">Selecione um produto:</div>        
                        <div class="card-body">
                            <form id="form" action="{{ route('EmporiumProduct.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="emporium_id" value="{{ $emporium->id }}">
                                <div class="form-group">    
                                    <select name="product_id" id="product_id" class="form-control">
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                            <div class="card-footer mt-2">
                                <div class="text-end my-1">
                                    <button form="form" type="submit" class="btn btn-outline-primary">Adicionar Produto</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
