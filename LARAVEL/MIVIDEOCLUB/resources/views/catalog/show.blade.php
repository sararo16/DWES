@extends('layouts.master')

@section('content')
    
    <div class="row">
        <div class="col-sm-4">
            {{-- Cambiamos ['poster'] por ->poster --}}
            <img src="{{ $pelicula->poster }}" style="height:400px"/>
        </div>

        <div class="col-sm-8">
            <h1>{{ $pelicula->title }}</h1>
            <p><strong> Año: </strong>{{ $pelicula->year }}</p>
            <p><strong> Director: </strong>{{ $pelicula->director }}</p>
            <p><strong> Sinopsis: </strong>{{ $pelicula->synopsis }}</p>

            <p><strong>Estado: </strong>
                @if($pelicula->rented)
                    Película actualmente alquilada.<br><br>
                    <a href="#" class="btn btn-danger">Devolver película</a>
                @else
                    Película disponible.<br><br>
                    <a href="#" class="btn btn-primary">Alquilar película</a>
                @endif
            </p>

            <a href="{{ url('/catalog/edit/' . $pelicula->id) }}" class="btn btn-warning">Editar película</a>
            <a href="{{ url('/catalog') }}" class="btn btn-default">Volver al listado</a>
        </div>
    </div>

@endsection