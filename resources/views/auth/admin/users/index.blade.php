@extends('adminlte::page')

@section('title', 'Barbeiros')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    <div class="text-center my-3">
    <a href="{{ route('users.create') }}">
        <x-adminlte-button label="Cadastrar Usuário" theme="success" class="btn-flat" icon="fas fa-lg fa-save" />
    </a>
</div>

@if (session('success'))
    <x-adminlte-callout theme="success" class="bg-teal" icon="fas fa-lg fa-thumbs-up" title="Sucesso!">
        <i class="text-dark">{{ session('success') }}</i>
    </x-adminlte-callout>
    
@endif

@php
    

    
@endphp

<x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config" striped hoverable bordered>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role ?? 'Nenhum cargo' }}</td>
            <td>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                    <i class="fa fa-lg fa-fw fa-pen"></i>
                </a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </button>
                </form>
                <a href="{{ route('users.show', $user->id) }}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                    <i class="fa fa-lg fa-fw fa-eye"></i>
                </a>

            </tr>
    @endforeach
</x-adminlte-datatable>

@stop

