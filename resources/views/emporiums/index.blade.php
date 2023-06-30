@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
    <div class="row mb-3">
        <div class="col-md-12">
            <a href="{{ route('emporiums.create') }}" class="btn btn-primary">Criar Parceiro</a>
        </div>
    </div>
    @foreach($emporiums as $emporium)
        <div class="card mb-4">
            <div class="card-header">{{ $emporium->name }}</div>
            <div class="card-body">
                <p><strong>Endereço:</strong> {{ $emporium->georeferencingAddress->address->address_street }}, {{ $emporium->georeferencingAddress->address->address_number }}</p>
                <p><strong>Bairro:</strong> {{ $emporium->georeferencingAddress->address->address_district }}</p>
                <p><strong>Cidade:</strong> {{ $emporium->georeferencingAddress->address->address_city }}</p>
                <p><strong>Estado:</strong> {{ $emporium->georeferencingAddress->address->address_state }}</p>
                <p><strong>CEP:</strong> {{ $emporium->georeferencingAddress->address->address_zipcode }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('emporiums.edit', $emporium->id) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('emporiums.destroy', $emporium->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection

