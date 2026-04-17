@extends('layouts.master')

     @section('content')
     
     <form action="{{ url('/catalog/create') }}" method="POST">
         <div class="form-group">
             <label for="title">Título</label>
             <input type="text" class="form-control" name="title" id="title">
         </div>
         <div class="form-group">
             <label for="year">Año</label>
             <input type="text" class="form-control" name="year" id="year">
         </div>
         <div class="form-group">
             <label for="director">Director</label>
             <input type="text" class="form-control" name="director" id="director">
         </div>
         <div class="form-group">
             <label for="poster">Poster</label>
             <input type="text" class="form-control" name="poster" id="poster">
         </div>
         <div class="form-group">
             <label for="synopsis">Resumen</label>
             <input type="textArea" class="form-control" name="synopsis" id="synopsis">
         </div>
         <button type="submit" class="btn btn-primary">Añadir pelicula</button> 
     </form>   

@stop 