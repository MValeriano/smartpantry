@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Administrar Perfis') }}</div>

                    <div class="card-body">
                        <a href="{{ route('profiles.create') }}" class="btn btn-primary">{{ __('Criar Perfil') }}</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('ID') }}</th>
                                    <th scope="col">{{ __('Nome') }}</th>
                                    <th scope="col">{{ __('Ações') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($profiles as $profile)
                                <tr>
                                    <th scope="row">{{ $profile->id }}</th>
                                    <td>{{ $profile->name }}</td>
                                    <td>
                                        <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-info">{{ __('Visualizar') }}</a>
                                        <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-warning">{{ __('Editar') }}</a>
                                        <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja excluir este perfil?')">{{ __('Excluir') }}</button>
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