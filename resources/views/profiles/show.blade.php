<!-- resources/views/profiles/show.blade.php -->

@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detalhes do Perfil') }}</div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" value="{{ $profile->name }}" readonly>
                        </div>
                    </div>

                    <!-- Adicione outros detalhes do perfil aqui -->
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <a href="{{ route('profiles.index') }}" class="btn btn-primary">{{ __('Voltar') }}</a>
        </div>
    </div>
</div>
</div>
@endsection
