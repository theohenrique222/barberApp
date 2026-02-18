@extends('adminlte::page')
@section('content_header')
@section('title', 'Horários')
<h1>Horários Disponíveis</h1>
<div class="text-center my-3">
    <a href="{{ route('schedules.create') }}">
        <x-adminlte-button label="Criar Disponibilidades" theme="success" class="btn-flat" icon="fas fa-lg fa-save" />
    </a>
</div>
@stop
@section('content')
<h1>Disponibilidades</h1>



@foreach($barbers as $barber)

<x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" striped hoverable bordered>
    <div class="card mb-4">
            <div class="card-body">
                <h1 class="card-title">Barbeiro: <strong>{{ $barber->user->name }}</strong></h1>
                @if($barber->schedules->isEmpty())
                    <p>Nenhum horário disponível.</p>
                @else
                    @foreach($barber->schedules as $schedule)
                        <tr>
                            <td>{{ $schedule->date->format('d/m/Y') }}</td>
                            <td>{{ ($schedule->start_time)->format('H:i') }}</td>
                            <td>{{ ($schedule->end_time)->format('H:i') }}</td>
                            <td>
                                @if($schedule->is_available)
                                    <span class="badge badge-success">Sim</span>
                                @else
                                    <span class="badge badge-danger">Não</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>
                                <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </div>
        </div>
    </x-adminlte-datatable>
@endforeach

@stop
