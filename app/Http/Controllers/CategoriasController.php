<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Receta;

class CategoriasController extends Controller
{
    public function show(Categoria $categoriaReceta){

        $recetas = Receta::where('categoria_id', $categoriaReceta->id)->paginate(5);

        return view('categorias.show')
        ->with(['recetas' => $recetas]);

    }
}
