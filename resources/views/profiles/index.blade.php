@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Administrar Perfis</div>

                    <div class="card-body">
                        <a href="{{ route('profiles.create') }}" class="btn btn-outline-primary">Criar Perfil</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($profiles as $profile)
                                <tr>
                                    <th scope="row">{{ $profile->id }}</th>
                                    <td>{{ $profile->name }}</td>
                                    <td>
                                        <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-outline-info">Visualizar</a>
                                        <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-outline-warning">Editar</a>
                                        <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Deseja excluir este perfil?')">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection