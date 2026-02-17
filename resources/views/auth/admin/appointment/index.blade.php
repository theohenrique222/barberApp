@extends('adminlte::page')

@section('title', 'Agendamentos')

@section('content_header')
<h1>Agendamentos</h1>
@stop

@section('content')
<div class="text-center my-3">
    <a href="{{ route('appointments.create') }}">
        <x-adminlte-button label="Novo Agendamento" theme="success" class="btn-flat" icon="fas fa-lg fa-save" />
    </a>
</div>

@if (session('success'))
    <x-adminlte-callout theme="success" class="bg-teal" icon="fas fa-lg fa-thumbs-up" title="Sucesso!">
        <i class="text-dark">{{ session('success') }}</i>
    </x-adminlte-callout>

@endif

@stop