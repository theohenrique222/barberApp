@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('css')
<style>
    .page-title-barber {
        color: #d4af37;
        font-weight: 600;
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

    .card-barber {
        background: #1c1c1c;
        border-radius: 10px;
        border: 1px solid #2a2a2a;
    }

    .card-barber .card-header {
        background: linear-gradient(90deg, #000, #1c1c1c);
        color: #ccc;
        border-bottom: 1px solid #333;
    }

    .dataTables_wrapper .dataTables_filter input {
        background: #1c1c1c;
        border: 1px solid #333;
        color: #fff;
    }
</style>
@stop


@section('title', 'Serviços')

@section('content_header')
<h1 class="page-title-barber">
    <i class="fas fa-cut mr-2"></i> Serviços
</h1>
@stop

@section('content')

<div class="card card-barber shadow-sm">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">
            Lista de Serviços
        </h4>

        <a href="{{ route('services.create') }}" class="btn btn-barber">
            <i class="fas fa-plus mr-1"></i> Novo Serviço
        </a>
    </div>

    <div class="card-body bg-dark">

        <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config" striped hoverable bordered
            class="table-dark-custom">

            @foreach($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>

                    <td class="font-weight-bold">
                        {{ $service->name }}
                    </td>

                    <td class="text-gold">
                        R$ {{ number_format($service->price, 2, ',', '.') }}
                    </td>

                    <td>
                        {{ $service->description ?? 'Sem descrição' }}
                    </td>

                    <td class="text-center">

                        <a href="{{ route('services.show', $service->id) }}" class="btn btn-sm btn-dark mx-1"
                            title="Detalhes">
                            <i class="fa fa-eye"></i>
                        </a>

                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-barber mx-1"
                            title="Editar">
                            <i class="fa fa-pen"></i>
                        </a>

                        <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm btn-danger mx-1" title="Excluir">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach

        </x-adminlte-datatable>

    </div>

</div>

@stop