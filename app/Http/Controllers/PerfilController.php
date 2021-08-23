<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;
use App\Models\Receta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        //Obtener las recetas con paginacion

        $recetas = Receta::where('user_id', '=' , $perfil['id'] )->paginate(10);

        return view('perfil.show')->with(['perfil'=>$perfil, 'recetas' => $recetas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        //Ejecutar el policy
        $this->authorize('view', $perfil);

        return view('perfil.edit')->with(['perfil' => $perfil]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {

        //Ejecutar el policy
        $this->authorize('update', $perfil);

        //Validar la informacion
        $data = request()->validate([
            'url' => 'required',
            'biografia' => 'required',
            'nombre' => 'required'
        ]); 


        //Verificar si el usuario sube una imagen
        if($request['imagen']){
            
            // Guardar la ruta de la imagen y definir el nombre de la ruta
            //ruta de las imagens: C:\xampp\htdocs\RecetasLaravelUnico\public\storage
            $ruta_imagen = $request['imagen']->store('upload-perfiles', 'public');

            // Resize de la imagen
            $img = Image::make( public_path("storage/{$ruta_imagen}") )->fit(600, 600);
            $img->save();

            //Crear un arreglo de imagen
            $array_imagen = ['imagen' => $ruta_imagen];
    
        }


        // Asignar nombre y URL
        auth()->user()->url = $data['url'];
        auth()->user()->name = $data['nombre'];
        auth()->user()->save();


        //Se debe hacer un unsert a las variables que ya no se van a usar de "data"
        unset($data['url']);
        unset($data['nombre']);
        
        // Luego procedemos a guardar la biografia en el perfil
        auth()->user()->perfil()->update( 
            array_merge($data,   $array_imagen ?? [] )
        );

        // Guardar la informacion


        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
