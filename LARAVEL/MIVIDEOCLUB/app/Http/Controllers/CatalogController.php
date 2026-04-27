<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

class CatalogController extends Controller
{
    public function getIndex()
{
	$peliculas = Movie::all();
	return view('catalog.index')->with('arrayPeliculas', $peliculas);
}

    public function getShow($id)
{
	$pelicula = Movie::findOrFail($id);
	return view('catalog.show')->with('pelicula', $pelicula);
}

public  function getCreate()
{
	
    return view('catalog.create');
}   

public function postCreate(Request $request){
	$pelicula = new Movie;
	$pelicula->title = $request->title;
	$pelicula->year = $request->year;
	$pelicula->director = $request->director;
	$pelicula->poster = $request->poster;
	$pelicula->rented = $request->rented;
	$pelicula->synopsis = $request->synopsis;
	$pelicula->rented=$request->input ('rented');
	$pelicula -> rented=false;
	$pelicula->save();
	return redirect('/catalog');
}
public function getEdit($id)
{
	$pelicula = Movie::findOrFail($id);
	return view('catalog.edit')->with('pelicula', $pelicula);
}

public function putEdit(Request $request, $id)
{
	$pelicula = Movie::findOrFail($id);
	$pelicula->title = $request->title;
	$pelicula->year = $request->year;
	$pelicula->director = $request->director;
	$pelicula->poster = $request->poster;
	$pelicula->rented = $request->rented;
	$pelicula->synopsis = $request->synopsis;
	$pelicula->save();
	return redirect('/catalog');
}
    
}

