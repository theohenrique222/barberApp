@extends('adminlte::page')

@section('title', 'Agendamentos')

@section('content_header')
    <h1>Agendamentos</h1>
@stop

@section('content')

<form action="{{ route('appointments.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="client_id">Cliente</label>
        <select name="client_id" id="client_id" class="form-control">
            @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="barber_id">Barbeiro</label>
        <select name="barber_id" id="barber_id" class="form-control">
            @foreach($barbers as $barber)
                <option value="{{ $barber->id }}">{{ $barber->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="service_id">Serviço</label>
        <select name="service_id" id="service_id" class="form-control">
            @foreach($services as $service)
                <option value="{{ $service->id }}">{{ $service->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="appointment_time">Data e Hora</label>
        <input type="datetime-local" name="appointment_time" id="appointment_time" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Agendar</button>
</form>

@stop
