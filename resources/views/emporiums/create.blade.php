@extends('home')

@section('content')
<div class="col-lg-10 col-md-9 content">
    <div class="card mb-4">
        <div class="card-header">
            <h3>Dados do Parceiro</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('emporiums.store') }}" method="POST">
                @csrf

                <div class="form-group mb-2">
                    <label for="emporium_name">Nome do Parceiro</label>
                    <input type="text" name="emporium_name" id="emporium_name" class="form-control" required>
                </div>
                
                <h3>Localização Geoespacial</h3>
                <div class="form-group mb-2">
                    <label for="x_coordinate">Coordenada X</label>
                    <input type="text" name="x_coordinate" id="x_coordinate" class="form-control" required>
                </div>

                <div class="form-group mb-2">
                    <label for="y_coordinate">Coordenada Y</label>
                    <input type="text" name="y_coordinate" id="y_coordinate" class="form-control" required>
                </div>

                <h3>Endereço</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="address_street">Rua</label>
                            <input type="text" name="address_street" id="address_street" class="form-control" required>
                        </div>

                        <div class="form-group mb-2">
                            <label for="address_district">Bairro</label>
                            <input type="text" name="address_district" id="address_district" class="form-control" required>
                        </div>

                        <div class="form-group mb-2">
                            <label for="address_state">Estado</label>
                            <input type="text" name="address_state" id="address_state" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="address_number">Número</label>
                            <input type="number" name="address_number" id="address_number" class="form-control" required>
                        </div>

                        <div class="form-group mb-2">
                            <label for="address_city">Cidade</label>
                            <input type="text" name="address_city" id="address_city" class="form-control" required>
                        </div>

                        <div class="form-group mb-2">
                            <label for="address_zipcode">CEP</label>
                            <input type="text" name="address_zipcode" id="address_zipcode" class="form-control" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-4">Criar Parceiro</button>
                <button type="reset" class="btn btn-secondary mt-4">Limpar</button>
                <a href="{{ route('emporiums.index') }}" class="btn btn-secondary mt-4">Voltar</a>
            </form>
        </div>
    </div>
</div>
@endsection
