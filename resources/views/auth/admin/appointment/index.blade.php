@extends('adminlte::page')

@section('title', 'Agendamentos')

@section('content_header')
<h1>Agendamentos</h1>
@stop

@section('css')
<style>
    .appointment-card {
        background: #1c1c1c;
        color: #f5f5f5;
        border-radius: 10px;
        transition: all .25s ease;
    }

    .appointment-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, .4);
    }

    .card-header-barber {
        background: linear-gradient(90deg, #000000, #1c1c1c);
        color: #d4af37;
        border-bottom: 1px solid #333;
    }

    .text-gold {
        color: #d4af37;
    }

    .badge-scheduled {
        background: #0d6efd;
    }

    .badge-completed {
        background: #198754;
    }

    .badge-canceled {
        background: #dc3545;
    }

    .btn-barber {
        background: #d4af37;
        color: #000;
        font-weight: 600;
        border-radius: 6px;
    }

    .btn-barber:hover {
        background: #b8962e;
        color: #000;
    }
</style>
@stop

@section('content')

@if (session('success'))
    <x-adminlte-callout theme="success" class="bg-teal" icon="fas fa-lg fa-thumbs-up" title="Sucesso!">
        <i class="text-dark">{{ session('success') }}</i>
    </x-adminlte-callout>

@endif

<div class="card shadow border-0 mb-4">

    <div class="card-header card-header-barber text-center">
        <h4 class="mb-0">
            <i class="fas fa-calendar-alt mr-2"></i>
            Agendamentos Recentes
        </h4>
        <small class="text-light">Últimos horários marcados</small>
        <div class="text-center col-md-3 w-full m-auto pb-3">
            <a href="{{ route('appointments.create') }}">
                <x-adminlte-button label="Novo Agendamento" class="btn btn-barber btn-block" icon="fas fa-lg fa-save" />
            </a>
        </div>
    </div>

    <div class="card-body bg-dark">
        <div class="row">
            @foreach($appointments as $appointment)
                <div class="col-lg-6">

                    <div class="card appointment-card mb-3 border-0">
                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="text-gold font-weight-bold mb-0">
                                    Agendamentos:
                                    <span class="text-white">
                                        {{ $appointment->barber->user->name }}
                                    </span>
                                </h5>

                                @if($appointment->status === 'scheduled')
                                    <span class="badge badge-scheduled px-3 py-2">Agendado</span>
                                @elseif($appointment->status === 'completed')
                                    <span class="badge badge-completed px-3 py-2">Concluído</span>
                                @elseif($appointment->status === 'canceled')
                                    <span class="badge badge-canceled px-3 py-2">Cancelado</span>
                                @endif
                            </div>

                            <hr style="border-color:#333">

                            <p class="mb-1">
                                <i class="fas fa-calendar text-gold mr-2"></i>
                                {{ $appointment->schedule->date->format('d/m/Y') }}
                            </p>

                            <div>
                                <p class="text-gold mt-2">
                                    Inicio de expediente:
                                </p>
                                <p class="mb-1">
                                    <i class="fas fa-clock text-gold mr-2"></i>
                                    {{ $appointment->schedule->start_time->format('H:i') }}
                                </p>

                            </div>

                            <div>
                                <p class="text-gold">
                                    Final de expediente
                                </p>
                                <p class="mb-3">
                                    <i class="fas fa-clock text-gold mr-2"></i>
                                    {{ $appointment->schedule->end_time->format('H:i') }}
                                </p>
                            </div>

                            <x-adminlte-button label="Ver todos" data-toggle="modal"
                                data-target="#modal{{ $appointment->id }}" class="btn btn-barber btn-block" />

                        </div>
                    </div>
                </div>
                {{-- Themed --}}
                <x-adminlte-modal id="modal{{ $appointment->id }}"
                    title="Agendamentos {{ $appointment->barber->user->name }}" theme="dark" icon="fas fa-calendar"
                    size='lg'>
                    <div class="row">
                        @foreach($appointments->where('barber_id', $appointment->barber->id) as $appointment)
                            <div class="col-lg-12">

                                <div class="card appointment-card mb-3 border-0">
                                    <div class="card-body">

                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="text-gold font-weight-bold mb-0">
                                                {{ $appointment->service->name }}
                                            </h5>

                                            @if($appointment->status === 'scheduled')
                                                <span class="badge badge-scheduled px-3 py-2">Agendado</span>
                                            @elseif($appointment->status === 'completed')
                                                <span class="badge badge-completed px-3 py-2">Concluído</span>
                                            @elseif($appointment->status === 'canceled')
                                                <span class="badge badge-canceled px-3 py-2">Cancelado</span>
                                            @endif
                                        </div>

                                        <hr style="border-color:#333">

                                        <p class="mb-1">
                                            <i class="fas fa-user text-gold mr-2"></i>
                                            {{ $appointment->client->name }}
                                        </p>

                                        <p class="mb-1">
                                            <i class="fas fa-cut text-gold mr-2"></i>
                                            {{ $appointment->barber->user->name }}
                                        </p>

                                        <p class="mb-1">
                                            <i class="fas fa-calendar text-gold mr-2"></i>
                                            {{ $appointment->schedule->date->format('d/m/Y') }}
                                        </p>

                                        <p class="mb-3">
                                            <i class="fas fa-clock text-gold mr-2"></i>
                                            {{ $appointment->schedule->start_time->format('H:i') }}
                                        </p>

                                        <a href="{{ route('appointments.show', $appointment->id) }}"
                                            class="btn btn-barber btn-block">
                                            Ver Detalhes
                                        </a>

                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </x-adminlte-modal>
            @endforeach
        </div>

    </div>
</div>


@stop