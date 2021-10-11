<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    //?Creación de los métodos (CREANDO MÉTODO PARA RETORNAR A LA VISTA 1)
    public function index(){
        return view('vista1');
    }
}
