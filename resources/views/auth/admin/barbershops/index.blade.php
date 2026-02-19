@extends('adminlte::page')
@section('title', 'Barbearia')
@section('css')
<style>

.text-gold {
    color: #d4af37;
}
.bg-gold {
    background-color: #d4af37;
}
</style>
@stop


@section('content_header')
    @if (session('success'))
        <x-adminlte-alert class="bg-teal text-uppercase" icon="fa fa-lg fa-thumbs-up" title="Sucesso" dismissable>
            {{ session('success') }}
        </x-adminlte-alert>
    @endif
@stop

@section('content')

    @if ($barbershops->isEmpty())
        <div class="alert alert-warning" role="alert">
            <strong>Aviso!</strong> Nenhuma barbearia cadastrada.
        </div>
        <div class="text-center my-3">
            <a href="{{ route('barbershops.create') }}">
                <x-adminlte-button label="Cadastrar Barbearia" theme="success" class="btn-flat" icon="fas fa-lg fa-plus" />
            </a>
        </div>
    @else
        
    <div class="container" style="max-width: 80%;">
        <div class="row justify-content-center">
            @foreach ($barbershops as $barbershop)
                <div class="col-md-12  mb-4">
                    <div class="card shadow-sm border-0">
                        
                        {{-- Imagem de capa --}}
                        @if($barbershop->cover_image)
                            <img src="{{ asset('storage/' . $barbershop->cover_image) }}" class="card-img-top" alt="Capa {{ $barbershop->name }}" style="height:150px; object-fit: cover; border-bottom: 1px solid #d4af37;">
                        @else
                            <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height:150px; border-bottom: 2px solid #d4af37;">
                                <span class="text-white">Sem imagem de capa</span>
                            </div>
                        @endif
    
                        <div class="card-body text-center bg-dark">
                            @if($barbershop->logo)
                                <img src="{{ asset('storage/' . $barbershop->logo) }}" alt="Logo {{ $barbershop->name }}" class="img-fluid rounded-circle mb-2" style="width:80px; height:80px; object-fit:cover; margin-top:-40px; border: 2px solid #d4af37;">
                            @else
                                <div class="rounded-circle bg-light mb-2" style="width:80px; height:80px; margin-top:-40px; border: 2px solid #d4af37; display:flex; align-items:center; justify-content:center;">
                                    <span class="text-muted">Logo</span>
                                </div>
                            @endif
    
                            <div class="card-body row w-full">
                                <div class="text-center mx-auto">
                                    <h5 class="card-title mt-2 text-bold text-gold">{{ $barbershop->name }}</h5>
                                    <p class="text-muted mb-1">{{ $barbershop->slug }}</p>
                                </div>
                            </div>
    
                            <p class="mb-1"><strong class="text-gold">Endereço:</strong> {{ $barbershop->address ?? 'Não informado' }}</p>
                            <p class="mb-1"><strong class="text-gold">Telefone:</strong> {{ $barbershop->phone ?? 'Não informado' }}</p>
                            <p class="mb-3"><strong class="text-gold">Horário:</strong> {{ $barbershop->opening_hours ?? 'Não informado' }}</p>
    
                            <div class="d-flex justify-content-center">
                                <div class="p-1">
                                    <a href="{{ route('barbershops.edit', $barbershop->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                </div>
    
                                <div class="p-1">
                                    <form action="{{ route('barbershops.destroy', $barbershop->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta barbearia?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
        
    @endif



@stop
