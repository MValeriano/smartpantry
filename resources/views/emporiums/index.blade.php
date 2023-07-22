@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
<div class="container d-flex justify-content-center">
    <div class="card" style="width: 100rem;">
        <div class="card-body p-5">

            <div class="card my-3">
                <div class="card-header">
                    <h3>Parceiros</h3>
                </div>
                <div class="card-body">  

                    @if ($emporiums->isEmpty())                    
                        <p class="text-center fs-4">Nenhum parceiro cadastrado.</p>
                    @else
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
                                    <a href="{{ route('emporiums.edit', $emporium->id) }}" class="btn btn-outline-primary">Editar</a>
                                    <form action="{{ route('emporiums.destroy', $emporium->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">Excluir</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
    <div class="row mb-3">
        <div class="col-md-12 text-end">
            <a href="{{ route('emporiums.create') }}" class="btn btn-outline-primary">Criar Parceiro</a>
        </div>
    </div>

</div>
@endsection

