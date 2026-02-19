@extends('adminlte::page')

@section('title', 'Cadastrar Barbearia')

@section('content_header')
    <h1>Cadastrar Barbearia</h1>
@stop

@section('content')

<form action="{{ route('barbershops.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">
                Informações básicas
            </h3>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <x-adminlte-input 
                        name="name" 
                        label="Nome da Barbearia *" 
                        placeholder="Ex: Barbearia do {{ auth()->user()->name }}"
                    />
                </div>
                <div class="col-md-6">
                    <x-adminlte-input 
                        name="slug" 
                        label="Slogan" 
                        placeholder="Ex: Estilo e tradição"
                    />
                </div>
                <div class="col-md-12">
                    <x-adminlte-textarea 
                        name="description" 
                        label="Descrição" 
                        rows="3"
                        placeholder="Descreva sua barbearia..."
                    />
                </div>
            </div>
        </div>
    </div>

    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">
                Imagens
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="logo" class="font-weight-bold">Logo</label>
                
                    <div class="border rounded p-3 text-center">
                        <input type="file" name="logo" id="logo" class="d-none">
                        <label for="logo" class="btn btn-outline-primary">
                            Selecionar Logo
                        </label>
                
                        <p class="text-muted mt-2 mb-0">
                            PNG ou JPG até 2MB
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="cover_image" class="font-weight-bold">Imagem da Capa</label>
                    <div class="border rounded p-3 text-center">
                        <input type="file" name="cover_image" id="cover_image" class="d-none">
                        <label for="cover_image" class="btn btn-outline-primary">
                            Selecionar Capa
                        </label>
                        <p class="text-muted mt-2 mb-0">
                            PNG ou JPG até 2MB
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">
                Contato
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <x-adminlte-input name="phone" label="Telefone" type="text"/>
                </div>
                <div class="col-md-6">
                    <x-adminlte-input name="email" label="Email" type="email"/>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">
                Endereço
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <x-adminlte-input name="zip_code" label="CEP"/>
                    <x-adminlte-input name="address" label="Endereço"/>
                </div>
                <div class="col-md-6">
                    <x-adminlte-input name="state" label="Estado"/>
                    <x-adminlte-input name="city" label="Cidade"/>
                </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <x-adminlte-button type="submit" label="Cadastrar Barbearia" theme="success" icon="fas fa-thumbs-up"/>
        </div>
    </div>
</form>

@stop

{{-- @section('js')
<script>
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>
@stop --}}