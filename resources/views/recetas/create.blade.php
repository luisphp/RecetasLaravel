@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('botones')
    <a  href="{{ route('recetas') }}" class="btn btn-primary mr-2 text-white">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M15.707 15.707a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 010 1.414zm-6 0a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 011.414 1.414L5.414 10l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
        Inicio </a>
@endsection

@section('content')
    

<div class="container">
    <h1> Crear nueva recetas:</h1>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action="{{ route('recetas.store') }}" novalidate enctype="multipart/form-data">
                @csrf
                {{-- Seccion para escribir el titulo de la receta --}}
                <div class="form-group">
                    <label for="titulo">Titulo Receta</label>
                    <input type="text" 
                            name="titulo" 
                            id="titulo" 
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
                            
                            @foreach ($categorias as $categoria)
                                <option 
                                    value="{{$categoria->id}}" 
                                    {{ old('categoria') == $categoria->id ? 'selected' : '' }} 
                                    > 
                                        {{$categoria->nombre}} 
                                </option>
                            @endforeach
                            <option selected disabled> -- Seleccione un valor -- </option>
                        <select>
                            {{-- {{$categorias}} --}}

                        @error('categoria')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>    
                            </span>
                        @enderror                              
                </div>
                {{-- Seccion para cargar la preparacion --}}
                <div class="form-group mt-4">
                    <label for="preparacion">Preparaci??n</label>
                    <input  
                        id="preparacion"
                        type="hidden"
                        name="preparacion"
                        value="{{old('preparacion')}}"/>
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
                        value="{{old('ingredientes')}}"/>
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
                            value="Agregar receta" 
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

