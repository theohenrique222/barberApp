@extends('adminlte::page')

@section('title', 'Criar Serviço')

@section('content_header')
<h1>Editar Serviço</h1>
@stop

@section('content')
<form action="{{ route('services.update', $service->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <x-adminlte-input name="name" label="Nome do serviço" type="text" placeholder="Nome do serviço" value="{{ $service->name }}" />
        <x-adminlte-input name="price" label="Preço do serviço" type="text" placeholder="Preço do serviço" value="{{ number_format($service->price, 2, ',', '.') }}" />
        <x-adminlte-button label="Salvar" theme="success" type="submit" class="btn-flat" icon="fas fa-lg fa-save" />
    </div>

@stop