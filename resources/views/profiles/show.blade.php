@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalhes do Perfil</div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-md-right">Nome</label>

                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control" value="{{ $profile->name }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <div class="col-md-6 offset-md-4 text-end">
                            <a href="{{ route('profiles.index') }}" class="btn btn-outline-primary">Voltar</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
