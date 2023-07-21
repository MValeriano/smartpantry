@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content d-flex justify-content-center align-items-center">
    <div class="card mb-4" style="width: 600px;">
        <div class="card-header">
            <img src="{{ asset('images/area_restrita.jpg') }}" alt="Logo da SmartPantry" class="img-fluid" style="max-width: 100%;">
        </div>
        <div class="card-body">
            <h2 class="card-title">Área Restrita</h2>
            <p class="card-text">Desculpe, mas esta área está reservada aos parceiros autorizados apenas. Se você acredita que deveria ter acesso a este local, por favor, entre em contato conosco.</p>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-12 text-end">
                    <a href="{{ route('home') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
