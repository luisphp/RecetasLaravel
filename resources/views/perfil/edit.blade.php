@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('botones')
    <a  href="{{ route('recetas') }}" class="btn btn-primary mr-2 text-white">Ir al Inicio </a>
@endsection

@section('content')

    <h1> Editar mi perfil </h1>

    <div class="row justify-content-center mt-5">
        <div class="col-md-10 bg-white p-3">
            <form 
                action="{{ route('perfil.update', ['perfil' => $perfil->id])}}" 
                method="POST"
                enctype="multipart/form-data"
            >
            @method('PUT')
            @csrf
                {{-- Seccion para escribir el nombre --}}
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" 
                            name="nombre" 
                            id="nombre"
                            class="form-control  @error('nombre') is-invalid @enderror " 
                            value="{{ $perfil->usuario->name }}"
                            placeholder="Tu nombre es?" />

                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>    
                        </span>
                    @enderror                            

                </div>
                {{-- Seccion para escribir el sitio web --}}
                <div class="form-group">
                    <label for="url">Sitio web</label>
                    <input type="text" 
                            name="url" 
                            id="url"
                            class="form-control  @error('url') is-invalid @enderror " 
                            value="{{ $perfil->usuario->url }}"
                            placeholder="Tu sitio web es?" />

                    @error('url')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>    
                        </span>
                    @enderror                            

                </div>
                {{-- Seccion para cargar la biografia --}}
                <div class="form-group mt-4">
                    <label for="biografia">Biografia</label>
                    <input  
                        id="biografia"
                        type="hidden"
                        name="biografia"
                        value="{{old('biografia')}}"/>
                        <trix-editor 
                            input="biografia"
                            class=" @error('biografia') is-invalid @endError "
                            ></trix-editor>

                        @error('biografia')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>    
                            </span>
                        @enderror                              
                </div>
                {{-- Seccion para cargar la imagen --}}
                <div class="form-group mt-4">
                    @if ($perfil->imagen)
                        

                    <div class="mt-3 mb-3">
                        <p>Imagen actual</p>
                        <img src="../../storage/{{ $perfil->imagen }}" alt="imagen_actual" style="width: 300px; border-radius: 30px" class="content-center">
                    </div>
                    @endif
                    <label for="imagen">Imagen</label>
                    <input 
                        id="imagen"
                        type="file"
                        class="form-control  @error('imagen') is-invalid @enderror "   
                        name="imagen"/>
                        @error('imagen')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>    
                            </span>
                        @enderror
                </div>

                {{-- boton para enviar el post de la receta --}}
                <div class="form-group">

                    <input type="submit" 
                            class="btn btn-primary"
                            value="Actualizar perfil" 
                                />
    
                </div>                                  
            </form>
        </div>
    </div>


@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
@endsection