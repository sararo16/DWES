@extends('layouts.master')

@section('content')
    
    <div class="row">
        <div class="col-sm-4">
            <img src="{{$arrayPeliculas['poster']}}" style="height:200px"/>
        </div>

        <div class="col-sm-8">
            <h1>{{$arrayPeliculas['title']}}</h1>
            <p><strong> Año: </strong>{{$arrayPeliculas['year']}}</p>
            <p><strong> Director: </strong>{{$arrayPeliculas['director']}}</p>
            <p><strong> Sinopsis: </strong>{{$arrayPeliculas['synopsis']}}</p>

            <button class="btn btn-danger" > Devolver pelicula </button>
            <button class="btn btn-warning" > Editar pelicula </button>
            <button class="btn btn-default" > Volver al listado </button>
        </div>
    </div>
@endsection
