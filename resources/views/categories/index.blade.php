@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
    <div class="container d-flex justify-content-center">
        <div class="card" style="width: 100rem;">
            <div class="card-body p-5">

                <h2>Lista de Categorias</h2>
                
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
                
                <div class="card mt-3">
                    <div class="card-body">   
                        @if ($categories->isEmpty()) 
                            <p class="text-center fs-4">Não há categorias cadastradas.</p>                                                    
                        @else                        
                            <table class="table table-striped table-small table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td style="width: 5%;">{{ $category->id }}</td>
                                            <td style="width: 20%;">{{ $category->category_name }}</td>
                                            <td style="width: 55%;">{{ $category->category_description }}</td>
                                            <td style="width: 20%;">
                                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-primary">Editar</a>
                                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger">Excluir</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <nav aria-label="Navegação da página de Categorias">
                                <ul class="pagination">
                                    @if ($categories->onFirstPage())
                                        <li class="page-item disabled">
                                    @else
                                        <li class="page-item">
                                    @endif
                                    <a class="page-link" href="{{$categories->previousPageUrl()}}" aria-label="Anterior">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Anterior</span>
                                    </a>
                                    </li>

                                    @for ($i = 1; $i <= $categories->lastPage(); $i++)
                                        <li class="page-item{{ $i == $categories->currentPage() ? ' active' : '' }}">
                                            <a class="page-link" href="{{ $categories->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor                                    

                                    @if ($categories->hasMorePages())
                                        <li class="page-item">
                                    @else
                                        <li class="page-item disabled">
                                    @endif
                                    <a class="page-link" href="{{$categories->nextPageUrl()}}" aria-label="Próximo">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Próximo</span>
                                    </a>
                                    </li>
                                </ul>
                            </nav>          
                        @endif
                    </div>
                </div>
                <div class="text-end  mt-4">
                    <a href="{{ route('categories.create') }}" class="btn btn-outline-primary">Criar Categoria</a>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                        Sair
                    </a>                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
