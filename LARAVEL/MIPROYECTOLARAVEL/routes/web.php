<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function()
{
return '¡Hola mundo!';
});

Route::get('ruta1/{id?}', function($id=0)
{
return 'User '.$id;
})
->where('id', '[0-9]+');

Route::get('ruta2', function()
{
return 'Esto es la ruta 2';
});
