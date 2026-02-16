@extends('adminlte::page')

@section('title', 'Criar Serviço')

@section('content_header')
<h1>Criar Serviço</h1>
@stop

@section('content')
<form action="{{ route('services.store') }}" method="POST">
    @csrf
    <div>
        <x-adminlte-input name="name" label="Nome do serviço" type="text" placeholder="Nome do serviço" />
        <x-adminlte-input name="price" label="Preço do serviço" type="text" placeholder="Preço do serviço" />
        <x-adminlte-button label="Salvar" theme="success" type="submit" class="btn-flat" icon="fas fa-lg fa-save" />
    </div>

@stop