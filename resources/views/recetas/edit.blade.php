@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('botones')
    <a  href="{{ route('recetas.create') }}" class="btn btn-primary mr-2 text-white">Crear receta </a>
@endsection

@section('content')
    

<div class="container">
    <h1> Editar receta "{{ $receta->titulo }}" </h1>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action="{{ route('recetas.update', ['receta'=>$receta->id]) }}" novalidate enctype="multipart/form-data">
                @method('PUT')
                @csrf
                {{-- Seccion para escribir el titulo de la receta --}}
                <div class="form-group">
                    <label for="titulo">Titulo Receta</label>
                    <input type="text" 
                            name="titulo" 
                            id="titulo"
                            value="{{$receta->titulo}}" 
                            class="form-control  @error('titulo') is-invalid @enderror " 
                            value="{{ old('titulo') }}"
                            placeholder="titulo de tu receta" />

                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>    
                        </span>
                    @enderror                            

                </div>
                {{-- Seccion para elegir la categoria --}}
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select 
                        name="categoria"
                        class="form-control @error('titulo') is-invalid @enderror "
                        id="categoria"
                        >
                            <option selected disabled> -- Seleccione un valor -- </option>
                            @foreach ($categorias as $id => $categoria)
                                <option 
                                    value="{{$id}}" 
                                    {{ $receta->categoria_id == $id ? 'selected' : '' }} 
                                    > 
                                        {{$categoria->nombre}} 
                                    </option>
                            @endforeach
                        <select>

                        @error('categoria')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>    
                            </span>
                        @enderror                              
                </div>
                {{-- Seccion para cargar la preparacion --}}
                <div class="form-group mt-4">
                    <label for="preparacion">Preparación</label>
                    <input  
                        id="preparacion"
                        type="hidden"
                        name="preparacion"
                        value="{{$receta->preparacion}}"/>
                        <trix-editor 
                            input="preparacion"
                            class=" @error('preparacion') is-invalid @endError "
                            ></trix-editor>

                        @error('preparacion')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>    
                            </span>
                        @enderror                              
                </div>
                {{-- Seccion para cargar los ingredientes --}}
                <div class="form-group mt-4">
                    <label for="ingredientes">Ingredientes</label>
                    <input  
                        id="ingredientes"
                        type="hidden"
                        name="ingredientes"
                        value="{{$receta->ingredientes}}"/>
                        <trix-editor 
                        input="ingredientes" 
                        class=" @error('ingredientes') is-invalid @endError "
                        ></trix-editor>

                        @error('ingredientes')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>    
                            </span>
                        @enderror                              
                </div>
                {{-- Seccion para cargar la imagen --}}
                <div class="form-group mt-4">
                    <div class="mt-3 mb-3">
                        <p>Imagen actual</p>
                        <img src="../../storage/{{ $receta->imagen }}" alt="imagen_actual" style="width: 300px; border-radius: 30px" class="content-center">
                    </div>
                    <label for="imagen">Imagen</label>
                    <input 
                        id="imagen"
                        type="file"
                        class="form-control  @error('imagen') is-invalid @enderror "   
                        name="imagen"/>
                </div>
                @error('imagen')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>    
                    </span>
                @enderror   

                {{-- boton para enviar el post de la receta --}}
                <div class="form-group">
                
                    <input type="submit" 
                            class="btn btn-primary"
                            value="Actualizar Receta" 
                             />
  
                </div>
            </form>
        </div>

    </div>

    
    @endsection
    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    @endsection
</div>

