@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    {{ auth()->user()->isClient() ? 'You are a client.' : '' }}
    {{ auth()->user()->isBarber() ? 'You are a barber.' : '' }}
    {{ auth()->user()->isAdmin() ? 'You are an admin.' : '' }}
@stop
