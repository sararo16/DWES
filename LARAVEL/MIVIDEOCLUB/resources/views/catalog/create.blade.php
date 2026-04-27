<div>
@extends('layouts.master')
@section('content')

    <div class="row">
        <div class="col-sm-6">
            <h1>Crear nueva película</h1>
            <form action="{{url('catalog/create')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Título">
                </div>
                <div class="form-group">
                    <label for="year">Año</label>
                    <input type="text" class="form-control" name="year" id="year" placeholder="Año">
                </div>
                <div class="form-group">
                    <label for="director">Director</label>
                    <input type="text" class="form-control" name="director" id="director" placeholder="Director">
                </div>
                <div class="form-group">
                    <label for="poster">Poster</label>
                    <input type="text" class="form-control" name="poster" id="poster" placeholder="Poster">
                </div>
                <div class="form-group">
                    <label for="rented">Estado</label>
                    <select class="form-control" name="rented" id="rented">
                        <option value="true">Disponible</option>
                        <option value="false">Alquilada</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="synopsis">Sinopsis</label>
                    <textarea class="form-control" name="synopsis" id="synopsis" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
        </div>
    </div>

@stop
</div>