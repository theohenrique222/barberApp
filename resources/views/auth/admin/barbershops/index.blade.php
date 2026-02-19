@extends('adminlte::page')

@section('title', 'Barbearia')

@section('content_header')
    <h1>Barbearia</h1>
@stop

@section('content')

    @if ($barbershops->name->isEmpty())
        <div class="alert alert-warning" role="alert">
            <strong>Aviso!</strong> Nenhuma barbearia cadastrada.
        </div>
    @else
        <div class="alert alert-info" role="alert">
            <strong>Barbearias Disponíveis</strong>
        </div>
        
    @endif
    <p>Bem-vindo à página de barbearias.</p>


    <div class="text-center my-3">
        <a href="{{ route('barbershops.create') }}">
            <x-adminlte-button label="Adicionar Barbearia" theme="success" class="btn-flat" icon="fas fa-lg fa-plus" />
        </a>
    </div>

@stop
