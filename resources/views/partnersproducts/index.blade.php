@extends('home')

@section('content')
    <div class="col-lg-10 col-md-9 content">
        <div class="container d-flex justify-content-center">
            <div class="card" style="width: 100rem;">
                <div class="card-body p-5">

                    <h1>Produtos do Parceiro : {{ $emporiums[0]->name }}</h1>   

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

                            <table class="table table-striped table-small table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($emporiums as $emporium)
                                            <tr>
                                                <td style="width: 5%;">{{ $emporium->id }}</td>
                                                <td style="width: 60%;">{{ $emporium->name }}</td>
                                                <td style="width: 35%;">
                                                    <a href="{{ route('EmporiumProduct.create', ['emporium' => $emporium->id]) }}" class="btn btn-outline-primary">Adicionar Produtos</a>
                                                    <a href="{{ route('EmporiumProduct.show', ['emporium' => $emporium->id]) }}" class="btn btn-outline-primary">Editar</a>
                                                    <form action="{{ route('EmporiumProduct.destroy', ['emporium' => $emporium->id]) }}" method="POST" style="display: inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger">Excluir</button>
                                                    </form>
                                                </td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="text-end mt-3">
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                            Sair
                        </a>                    
                    </div> 

                </div>
            </div>
        </div>        
    </div>
@endsection
