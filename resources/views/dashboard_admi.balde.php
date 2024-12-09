@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bienvenido, {{ Auth::user()->name }}</h1>
    <h3>Opciones disponibles:</h3>
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('horario.index') }}" class="btn btn-primary btn-lg btn-block">Horario</a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('reporte.index') }}" class="btn btn-secondary btn-lg btn-block">Reporte</a>
        </div>
    </div>
</div>
@endsection
