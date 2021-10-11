<?php

use Illuminate\Support\Facades\Route;
//?Sieva para validar si una vista existe
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//* para indicar una ruta, utilizamos palabra reservada route, seguido por le método get que toma 2 parámetros (la ruta, y una función anónima que devuelve lo que queremos mostrar)
Route::get('/', function () {
    return view('welcome');
});

//?Estamos llamando a la función index (que devuelve una vista) del controlador InicioController
Route::get('/vista1', 'App\Http\Controllers\InicioController@index');

if (view::exists('vista2')){
    Route::get('/vista2', function () {
        return view('vista2');
    });
}else{
    Route::get('/vista2', function () {
        return 'La vista2 no existe';
    });
};


//?Ejemplo 1, regresando texto  
Route::get('/texto', function () {
    return 'Esto es un texto';
});

//?Ejemplo 3, tomando un parámetro  
Route::get('/nombre/{nombre}', function ($nombre) {
    return '<h1>El nombre es: '.$nombre.' </h1>';
});

//?Ejemplo 4, parámetro por default
Route::get('/cliente/{cliente?}', function ($cliente='Cliente general') {
    return '<h1>El nombre es: '.$cliente.' </h1>';
});


//?Ejemplo 5, redireccionamiento de rutas  
Route::get('/ruta1', function () {
    return 'Esto es la ruta 1';
})->name('rutauno');
Route::get('/ruta2', function () {
    //return 'Esto es la ruta 2';
    return redirect()->route('rutauno');
});


//?Ejemplo 6, validación de que se ingrese solo números
Route::get('/usuario/{usuario?}', function ($usuario) {
    return '<h1>El nombre es: '.$usuario.' </h1>';
})->where('usuario','[0-9]+');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
