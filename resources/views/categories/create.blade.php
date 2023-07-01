@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
    <h2>Criar Categoria</h2>
    
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
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="category_name">Nome:</label>
                    <input type="text" name="category_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="category_description">Descrição:</label>
                    <input type="text" name="category_description" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>
@endsection
