@extends('layouts.app')

@section('content')
    
    
    <article class="contenido-receta">
        <h1 class="text-center mb-4"> {{$receta->titulo}} </h1>

        <div class="imagen-receta mt-2">
            <img src="../storage/{{ $receta->imagen }}" alt="imagen_receta" class="w-100" style="border-radius: 40px;">
        </div>

        <div class="receta-meta"> 
                 <p class="">
                    <span class="font-weight-bold text-primary">
                        Escrito en:
                    </span>{{$receta->categoria->nombre}}
                    
                 </p>
                 <p class="">
                    <span class="font-weight-bold text-primary">
                        {{-- TODO: Mostrar el usuario --}}
                        Autor: 
                    </span>{{$receta->autor->name}}
                 </p>
                 <p class="">
                    <span class="font-weight-bold text-primary">
                        {{-- TODO: Mostrar el usuario --}}
                        Fecha: 
                    </span>
                    <fecha-receta fecha="{{$receta->created_at}}"></fecha-receta>
                 </p>
        </div>
        <div class="ingredientes">
            <h2 class="my-3 text-primary">Ingredientes</h2>

             {!! $receta->ingredientes !!}
        </div>
        <div class="preparaciom">
            <h2 class="my-3 text-primary">Preparacion</h2>

            {!! $receta->preparacion !!}
        </div>
    </article>
@endsection

