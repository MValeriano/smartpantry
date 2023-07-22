@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
    <div class="container d-flex justify-content-center">

        <div class="card" style="width: 100rem;">
            <div class="card-body p-5">

                <h2 class="text-center mb-3">Configurações da conta do usuário</h2>
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        <ul>
                            {{ session('error') }}
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif 

                <div class="card">
                    <div class="card-body p-5">
                        <h2 class="pb-3">Alterar dados pessoais</h2>

                        <form action="{{ route('account.update') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Nova Senha</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Repetir Senha</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Alterar</button>
                        </form>
                    </div>
                </div>

                @if ($user->profile_id === 1)
                    <div class="card my-5">
                        <div class="card-body p-5">
                            <h2 class="pb-3">Atribuir perfil ao usuário</h2>

                            <form action="{{ route('account.assignProfile') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="user" class="form-label">Selecione o Usuário</label>
                                    <select class="form-select" id="user" name="user" required>
                                        <option value="" selected disabled>Selecione...</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>                                
                                <div class="mb-3">
                                    <label for="profile" class="form-label">Selecione o perfil</label>
                                    <select class="form-select" id="profile" name="profile" required>
                                        <option value="" selected disabled>Selecione...</option>
                                        @foreach ($profiles as $profile)
                                            <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Atribuir perfil</button>
                            </form>
                        </div>
                    </div>
                @endif

                <div class="card my-5">
                    <div class="card-body p-5">
                        <h2 class="pb-3">Excluir conta</h2>
                        <p>Ao excluir sua conta, todo o histórico de listas e despensa será apagado. Essa ação não poderá ser desfeita.</p>
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">Excluir conta</button>
                    </div>
                </div>

                <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteAccountModalLabel">Confirmação de exclusão de conta</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Ao excluir sua conta, todo o histórico de listas e despensa será apagado. Essa ação não poderá ser desfeita.</p>
                                <p>Deseja continuar?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <form action="{{ route('account.destroy') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Excluir conta</button>
                                </form>
                            </div>
                        </div>
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
