@extends('adminlte::page')

@section('title', 'Serviços')

@section('content_header')
<h1>Serviços</h1>
@stop

@section('content')

<div class="text-center my-3">
    <a href="{{ route('services.create') }}">
        <x-adminlte-button label="Cadastrar Serviço" theme="success" class="btn-flat" icon="fas fa-lg fa-save" />
    </a>
</div>

@php
    
@endphp

<x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config" striped hoverable bordered>
    @foreach($services as $service)
        <tr>
            <td>{{ $service->id }}</td>
            <td>{{ $service->name }}</td>
            <td>{{ number_format($service->price, 2, ',', '.') }}</td>
            <td>{{ $service->description ?? 'Nenhuma descrição disponível' }}</td>
            <td>
                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                    <i class="fa fa-lg fa-fw fa-pen"></i>
                </a>
                <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </button>
                </form>
                <a href="{{ route('services.show', $service->id) }}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                    <i class="fa fa-lg fa-fw fa-eye"></i>
                </a>
            </tr>
        @endforeach
</x-adminlte-datatable>


@stop