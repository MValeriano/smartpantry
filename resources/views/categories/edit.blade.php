@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
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
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
