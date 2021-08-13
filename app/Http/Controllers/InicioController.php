<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receta;

class InicioController extends Controller
{
    public function index(){

        $recetas = Receta::orderby('created_at', 'desc')->get();

        // dd($recetas);

        return view('welcome')
        ->with(['recetas' => $recetas]);
    }
}
