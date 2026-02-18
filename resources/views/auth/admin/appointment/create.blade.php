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
        <x-adminlte-select name="barber_id" label="Barbeiro">
            @foreach ($barbers as $barber)
                <option value="{{ $barber->id }}">{{ $barber->user->name }}</option>
            @endforeach
        </x-adminlte-select>
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
        <x-adminlte-select name="schedule_id" label="Horários Disponíveis">
            @foreach ($schedules as $schedule)
                <option value="{{ $schedule->id }}">{{ $schedule->start_time->format('H:i') }}</option>
            @endforeach
        </x-adminlte-select>
    </div>
    <button type="submit" class="btn btn-primary">Agendar</button>
</form>

@stop
