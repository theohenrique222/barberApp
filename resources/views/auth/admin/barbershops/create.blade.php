@extends('adminlte::page')

@section('title', 'Cadastrar Barbearia')

@section('content_header')
    <h1>Cadastrar Barbearia</h1>
@stop

@section('content')


<form action="{{ route('barbershops.store') }}" method="post">
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
                    label="Nome da Barbearia" 
                    placeholder="Ex: Barbearia do Theo"
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


    <h4>Imagens</h4>

    <x-adminlte-input-file name="logo" label="Logo"/>
    <x-adminlte-input-file name="cover_image" label="Capa"/>

    
    
    <h4>Contato</h4>
    
    <x-adminlte-input name="phone" label="Telefone" type="text"/>
    <x-adminlte-input name="email" label="Email" type="email"/>
    
    <h4>Endereço</h4>
    
    <x-adminlte-input name="address" label="Endereço"/>
    <x-adminlte-input name="city" label="Cidade"/>
    <x-adminlte-input name="state" label="Estado"/>
    <x-adminlte-input name="zip_code" label="CEP"/>
    
    <x-adminlte-button type="submit" label="Salvar" theme="success" icon="fas fa-thumbs-up"/>

</form>

@stop
