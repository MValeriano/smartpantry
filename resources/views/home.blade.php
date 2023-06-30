@extends('layouts.layout')

@section('sidebar')
    <div class="col-lg-2 col-md-3 sidebar">
        <img src="{{ asset('images/logoSmartPantry2.jpg') }}" alt="Logo da SmartPantry">
        <h4>Olá, {{ Auth::user()->name }}</h4>        
        <a href="{{ route('supermarket_lists.create') }}">Administrar Listas</a>
        <a href="{{ route('products.index') }}">Administrar Produtos</a>
        <a href="#">Adicionar Item à Despensa</a>
        <a href="#">Editar Item da Despensa</a>
        <a href="#">Remover Item da Despensa</a>
        <a href="{{ route('categories.index') }}">Administrar Categorias</a>
        <a href="{{ route('administrar.perfis') }}">Administrar perfis</a>
        <a href="{{ route('emporiums.index') }}">Administrar Parceiros</a>
        <a href="{{ route('EmporiumProduct.index')}}">Administrar produtos parceiros</a>
        <a href="#">Indicação de Locais com Melhores Preços</a>
        <a href="#">Sistema de Ranking para Produtos "Novos"</a>
        <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
@endsection

@section('content')
      <div class="col-lg-10 col-md-9 content">
          @yield('content-main')
      </div>
@endsection

