@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
    <div class="container d-flex justify-content-center">
        <div class="card" style="width: 100rem;">
            <div class="card-body p-5">

                <h2>Despensa</h2>
                
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
                        @if ($larderItems->isEmpty()) 
                            <p class="text-center fs-4">Não há Itens cadastrados na despensa.</p>                                                    
                        @else                        
                            <table class="table table-striped table-small table-hover">
                                <thead>
                                    <tr>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Data de Validade</th>
                                    <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach ($larderItems as $larder)
                                        <tr>
                                            <td style="width: 5%;">{{ $larder->products->first()->product_name }}</td>
                                            <td style="width: 20%;">{{ $larder->products->first()->pivot->quantity  }}</td>
                                            <td style="width: 55%;">{{ $larder->products->first()->pivot->expiration_date  }}</td>
                                            <td style="width: 20%;">
                                            <a href="{{ route('larders.edit', $larder->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{ route('larders.destroy', $larder->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir este item da despensa?')">Excluir</button>
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <nav aria-label="Navegação da página da despensa">
                                <ul class="pagination">
                                    @if ($larderItems->onFirstPage())
                                        <li class="page-item disabled">
                                    @else
                                        <li class="page-item">
                                    @endif
                                    <a class="page-link" href="{{$larderItems->previousPageUrl()}}" aria-label="Anterior">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Anterior</span>
                                    </a>
                                    </li>

                                    @for ($i = 1; $i <= $larderItems->lastPage(); $i++)
                                        <li class="page-item{{ $i == $larderItems->currentPage() ? ' active' : '' }}">
                                            <a class="page-link" href="{{ $larderItems->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor                                    

                                    @if ($larderItems->hasMorePages())
                                        <li class="page-item">
                                    @else
                                        <li class="page-item disabled">
                                    @endif
                                    <a class="page-link" href="{{$larderItems->nextPageUrl()}}" aria-label="Próximo">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Próximo</span>
                                    </a>
                                    </li>
                                </ul>                            
        
                        @endif
                    </div>
                </div>
                <div class="text-end">
                    <a href="{{ route('larders.create') }}" class="btn btn-primary mt-4">Adicionar Item à Despensa</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
