@extends('adminlte::page')

@section('title', 'Disponibilidades')

@section('content_header')
    <h1>Disponibilidades</h1>
@stop

@section('content')

<form action="{{ route('schedules.update', $schedule->id) }}" method="post">
    @method('PUT')
    @csrf
    <div class="form-group">
        <x-adminlte-select name="barber_id" label="Barbeiro">
            @foreach ($barbers as $barber)
                <option value="{{ $barber->id }}">{{ $barber->user->name }}</option>
            @endforeach
        </x-adminlte-select>
    </div>
    <div class="form-group">
        <x-adminlte-input name="date" label="Data" type="date" value="{{ $schedule->date->format('Y-m-d') }}"/>
    </div>
    <div class="form-group">
    </div>
    <div class="form-group">
        <x-adminlte-input name="start_time" label="Inicio do Expediente" type="time" value="{{ $schedule->start_time->format('H:i') }}"/>
        </div>
        <div class="form-group">
            <x-adminlte-input name="end_time" label="Final de Expediente" type="time" value="{{ $schedule->end_time->format('H:i') }}"/>
    </div>
    <div class="form-group">
        <x-adminlte-input name="interval_minutes" label="Intervalo entre horários" type="number" value="30"/>
    </div>

    <x-adminlte-button type="submit" label="Salvar" theme="success" icon="fas fa-thumbs-up"/>
</form>


    
    
@stop
