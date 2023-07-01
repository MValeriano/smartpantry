@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
    <div class="card mb-4">
        <div class="card-header">{{ $emporium->name }}</div>        
        <div class="card-body">
            <p><strong>Endereço:</strong> {{ $emporium->georeferencingAddress->address->address_street }}, {{ $emporium->georeferencingAddress->address->address_number }}</p>
            <p><strong>Bairro:</strong> {{ $emporium->georeferencingAddress->address->address_district }}</p>
            <p><strong>Cidade:</strong> {{ $emporium->georeferencingAddress->address->address_city }}</p>
            <p><strong>Estado:</strong> {{ $emporium->georeferencingAddress->address->address_state }}</p>
            <p><strong>CEP:</strong> {{ $emporium->georeferencingAddress->address->address_zipcode }}</p>
            <p><strong>Coordenadas:</strong> {{ $emporium->georeferencingAddress->x_coordinate}}, {{ $emporium->georeferencingAddress->y_coordinate }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('emporiums.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div> 
</div>
@endsection
