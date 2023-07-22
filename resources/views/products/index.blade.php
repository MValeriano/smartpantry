@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
<div class="container d-flex justify-content-center">
    <div class="card" style="width: 100rem;">
        <div class="card-body p-5">
            <h2>Produtos</h2>

            <div class="card my-3">
                <div class="card-body">  

                    @if ($products->isEmpty())                    
                        <p class="text-center fs-4">Nenhum produto cadastrado.</p>
                    @else
                        <table class="table table-striped table-small table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Peso</th>
                                    <th>Unidades de Medida</th>
                                    <th>Categoria</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->product_description }}</td>
                                        <td>{{ $product->product_weight }}</td>
                                        <td>{{ $product->measurement_units }}</td>
                                        <td>{{ $product->category->category_name }}</td>
                                        <td>
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-primary">Editar</a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <nav aria-label="Navegação da página de Produtos">
                                <ul class="pagination justify-content-center">
                                    @if ($products->onFirstPage())
                                        <li class="page-item disabled">
                                    @else
                                        <li class="page-item">
                                    @endif
                                    <a class="page-link" href="{{$products->previousPageUrl()}}" aria-label="Anterior">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Anterior</span>
                                    </a>
                                    </li>

                                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                                        <li class="page-item{{ $i == $products->currentPage() ? ' active' : '' }}">
                                            <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor                                    

                                    @if ($products->hasMorePages())
                                        <li class="page-item">
                                    @else
                                        <li class="page-item disabled">
                                    @endif
                                    <a class="page-link" href="{{$products->nextPageUrl()}}" aria-label="Próximo">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Próximo</span>
                                    </a>
                                    </li>
                                </ul>
                            </nav>  

                    @endif
                </div>
            </div>
            <div class="text-end">
                <a href="{{ route('products.create') }}" class="btn btn-outline-primary">Criar Novo Produto</a>
                <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                    Sair
                </a>                 
            </div>
        </div>
    </div>
</div>
@endsection
