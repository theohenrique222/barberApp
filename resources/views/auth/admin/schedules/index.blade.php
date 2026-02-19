@extends('adminlte::page')
@section('css')
<style>
    .card-barber-clean {
        background: #fff;
        border-radius: 10px;
        border: 1px solid #e5e5e5;
    }

    .btn-barber {
        background: #d4af37;
        color: #000;
        font-weight: 600;
        border-radius: 6px;
    }

</style>
@stop

@section('title', 'Horários')

@section('content_header')
<h1 class="font-weight-bold">Horários Disponíveis</h1>
@stop

@section('content')

@foreach($barbers as $barber)

    <div class="card card-barber-clean mb-4 bg-dark">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                {{ $barber->user->name }}
            </h5>

            <a href="{{ route('schedules.create') }}" class="btn btn-sm btn-barber">
                <i class="fas fa-plus mr-1"></i> Novo horário
            </a>
        </div>

        <div class="card-body">

            @if ($barber->schedules->isEmpty())

                <div class="alert alert-warning mb-0">
                    Nenhum horário cadastrado para este barbeiro.
                </div>

            @else

                <x-adminlte-datatable id="table{{ $barber->id }}" :heads="$heads" head-theme="dark" striped hoverable bordered
                    class="table-dark-custom">

                    @foreach($barber->schedules as $schedule)
                        <tr>
                            <td>{{ $schedule->date->format('d/m/Y') }}</td>

                            <td>{{ $schedule->start_time->format('H:i') }}</td>

                            <td>{{ $schedule->end_time->format('H:i') }}</td>

                            <td>
                                @if($schedule->is_avaliable == 0)
                                    <span class="badge badge-success">Disponível</span>
                                @else
                                    <span class="badge badge-danger">Indisponível</span>
                                @endif
                            </td>

                            <td>

                                <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-sm btn-barber mx-1">
                                    <i class="fa fa-pen"></i>
                                </a>

                                <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger mx-1">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach

                </x-adminlte-datatable>

            @endif

        </div>

    </div>

@endforeach

@stop