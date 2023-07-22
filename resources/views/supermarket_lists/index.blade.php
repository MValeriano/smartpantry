@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
<div class="container d-flex justify-content-center">
        <div class="card">
            <div class="card-body p-5">

                <h1 class="text-center"><i class="fas fa-tasks text-success"  --bs-success-bg-subtle></i><span class="menu-text">  Minhas listas </span></h1>
                
                <div class="card mt-3">
                    <div class="card-body">  

                        @if ($supermarketLists->isEmpty())    
                            <p>Nenhuma lista de compras encontrada.</p>
                        @else
                            <table class="table table-striped table-small table-hover table-fixed">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Lista</th>         
                                        <th>Valor Total da lista</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($supermarketLists as $supermarketList)
                                        <tr>
                                        <td>{{ $supermarketList->id }}</td>
                                            <td>{{ $supermarketList->list_name }}</td>
                                            <td class="text-center">{{ $supermarketList->supermarket_list_price_total }}</td>
                                            <td>
                                                <a href="{{ route('supermarket_lists.show', $supermarketList->id) }}" class="btn btn-outline-primary">Editar</a>                                           
                                                <form action="{{ route('supermarket_lists.destroy', $supermarketList->id) }}" method="POST" style="display: inline-block;">
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
                                    @if ($supermarketLists->onFirstPage())
                                        <li class="page-item disabled">
                                    @else
                                        <li class="page-item">
                                    @endif
                                    <a class="page-link" href="{{$supermarketLists->previousPageUrl()}}" aria-label="Anterior">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Anterior</span>
                                    </a>
                                    </li>

                                    @for ($i = 1; $i <= $supermarketLists->lastPage(); $i++)
                                        <li class="page-item{{ $i == $supermarketLists->currentPage() ? ' active' : '' }}">
                                            <a class="page-link" href="{{ $supermarketLists->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor                                    

                                    @if ($supermarketLists->hasMorePages())
                                        <li class="page-item">
                                    @else
                                        <li class="page-item disabled">
                                    @endif
                                    <a class="page-link" href="{{$supermarketLists->nextPageUrl()}}" aria-label="Próximo">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Próximo</span>
                                    </a>
                                    </li>
                                </ul>
                            </nav> 

                        @endif
                    </div>
                </div>
                <div class="text-end mt-3">
                    <a href="{{ route('supermarket_lists.create') }}" class="btn btn-outline-primary">Criar Nova Lista de Compras</a>
                </div>
        </div>
    </div>
</div>
@endsection
