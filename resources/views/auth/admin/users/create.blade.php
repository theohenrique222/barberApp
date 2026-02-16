@extends('adminlte::page')

@section('title', 'Cadastro de Usuários')

@section('content_header')
<h1>Cadastro de Usuários</h1>
@stop

@section('content')
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div>
        <x-adminlte-input name="name" label="Nome Completo" type="text" placeholder="Nome do usuário" />
        <x-adminlte-input name="email" label="E-mail" type="email" placeholder="Email do usuário" />
        <x-adminlte-input name="password" label="Senha" type="password" placeholder="Senha do usuário" />
        <x-adminlte-input name="password_confirmation" label="Confirmar Senha" type="password" placeholder="Confirme a senha do usuário" />
        <x-adminlte-select name="role" label="Permissão">
            <option value="client">Cliente</option>
            <option value="admin">Administrador</option>
            <option value="barber">Barbeiro</option>
        </x-adminlte-select>

        <x-adminlte-button label="Salvar" theme="success" type="submit" class="btn-flat" icon="fas fa-lg fa-save" />
    </div>
</form>
@stop