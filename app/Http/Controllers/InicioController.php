<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receta;
use App\Models\Categoria;
use Illuminate\Support\Str;

class InicioController extends Controller
{
    public function index(){

        $recetas = Receta::orderby('created_at', 'desc')->take(5)->get();

        $categorias = Categoria::all();

        $recetaCategory = [];

        //Agrupar recetas por categoria
        foreach( $categorias as $categoria ){
            $recetaCategory[ Str::slug($categoria->nombre) ][] = Receta::where('categoria_id', $categoria->id )
            ->take(3)->get();
        }

        // return $recetaCategory;

        return view('welcome')
        ->with(['recetas' => $recetas])
        ->with(['recetaCategory' => $recetaCategory]);
    }
}
