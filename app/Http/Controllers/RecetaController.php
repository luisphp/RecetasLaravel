<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receta;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Pagination\Paginator;


class RecetaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except' => ['show']]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recetas = Receta::where('user_id', '=', Auth::user()->id)->paginate(5);
        $categorias = Categoria::all();
        $usuario = Auth::user();

        // auth()->user()->meGusta->dd();

        return view('recetas.index')
        ->with([
                'categorias' => $categorias, 
                'recetas' => $recetas,
                'usuario' => $usuario
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categorias = Categoria::all();

        return view('recetas.create')->with(['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
        // Validación
        $data = request()->validate([
            'titulo' => 'required|min:6',
            'categoria' => 'required',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'imagen' => 'required|image'
        ]);


        // dd($request);
        // Guardar la ruta de la imagen y definir el nombre de la ruta
        //ruta de las imagens: C:\xampp\htdocs\RecetasLaravelUnico\public\storage
        $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');

        // Resize de la imagen
        $img = Image::make( public_path("storage/{$ruta_imagen}") )->fit(1000, 550);
        $img->save();

        // Insertar dator en la DB
        DB::table('recetas')->insert([
            'titulo' => $data['titulo'],
            'categoria_id' => $data['categoria'],
            'preparacion' => $data['preparacion'],
            'ingredientes' => $data['ingredientes'],
            'user_id' => Auth::user()->id,
            'imagen' => $ruta_imagen
        ]);

            // Almacenar en la base de datos con modelo

        // Auth::user()->recetas()->create([
        //         'titulo' => $data['titulo'],
        //         'categoria_id' => $data['categoria'],
        //         'preparacion' => $data['preparacion'],
        //         'ingredientes' => $data['ingredientes'],
        //         'imagen' => $ruta_imagen
        //     ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        //Obtener si a el usuario le gusta la receta y esta autenticado

        $like = (Auth::user() ? Auth::user()->meGusta->contains($receta->id)  : false);


        //Pasa la cantidad de likes
        $like_quantity = $receta->likes->count();

        return view('recetas.show')
        ->with(['receta' => $receta, 'like' => $like, 'like_quantity' => $like_quantity]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        $this->authorize('view', $receta);

        $categorias = Categoria::all();

        return view('recetas.edit')->with(['receta'=>$receta, 'categorias'=>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {

                //Luego de crear un policy lo implementamos para evitar que un usario solo pueda editar 
                // las recetas cargadas por el

                $this->authorize('update', $receta);

                // Validación
                $data = request()->validate([
                    'titulo' => 'required|min:6',
                    'categoria' => 'required',
                    'preparacion' => 'required',
                    'ingredientes' => 'required',
                    // 'imagen' => 'required|image'
                ]);

                // return $request;

                $receta->titulo = $data['titulo'];
                $receta->categoria_id = $data['categoria'];
                $receta->ingredientes = $data['ingredientes'];
                $receta->preparacion = $data['preparacion'];
                $receta->user_id = Auth::user()->id;

                if($request['imagen']){
                    $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');

                    $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
                    $img->save();
                    $receta->imagen = $ruta_imagen;
                }

                $receta->save();

                return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {

        // Le pasamos el policy para que los usuarios solo puedan eliminar sus recetas

        $this->authorize('delete', $receta);


        // // Eliminamos la receta una vez pasa la validacion del policy
        $receta->delete();

        return  'Receta '.$receta->nombre.' eliminada!';
    }
}
