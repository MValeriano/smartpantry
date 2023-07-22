@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
    <div class="container d-flex justify-content-center">
        <div class="card" style="width: 100rem;">
            <div class="card-body p-5">

                <h2>Editar Categoria</h2>
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="{{ route('categories.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="category_name">Nome:</label>
                                <input type="text" name="category_name" class="form-control" value="{{ $category->category_name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="category_description">Descrição:</label>
                                <input type="text" name="category_description" class="form-control" value="{{ $category->category_description }}" required>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="form-group text-end">                    
                                        <button type="submit" class="btn btn-outline-primary">Atualizar</button>
                                        <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
                                            Cancelar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
