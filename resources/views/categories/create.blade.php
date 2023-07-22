@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
    <div class="container d-flex justify-content-center">
        <div class="card" style="width: 100rem;">
            <div class="card-body p-5">

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

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div class="form-group my-3">
                                <label for="category_name">Nome:</label>
                                <input type="text" name="category_name" class="form-control" required>
                            </div>
                            <div class="form-group my-3">
                                <label for="category_description">Descrição:</label>
                                <input type="text" name="category_description" class="form-control" required>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-outline-primary">Salvar</button>
                                <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
                                    Cancelar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
