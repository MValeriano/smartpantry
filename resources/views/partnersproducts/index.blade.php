@extends('home')

@section('content')
    <div class="col-lg-10 col-md-9 content">
        <h1>Produtos do Parceiro: {{ $emporiums[0]->name }}</h1>   

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emporiums as $emporium)
                        <tr>
                            <td>{{ $emporium->id }}</td>
                            <td>{{ $emporium->name }}</td>
                            <td>
                                <a href="{{ route('EmporiumProduct.create', ['emporium' => $emporium->id]) }}" class="btn btn-primary">Adicionar Produtos</a>
                                <a href="{{ route('emporiums.edit', ['emporium' => $emporium->id]) }}" class="btn btn-primary">Editar</a>
                                <form action="{{ route('EmporiumProduct.destroy', ['emporium' => $emporium->id]) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>        
    </div>
@endsection
