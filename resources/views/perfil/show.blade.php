@extends('layouts.app')

@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-5">
                <img src="../storage/{{ $perfil->imagen }}" alt="imagen_actual" style="width: 300px;" class="content-center rounded-circle">
            </div>
            <div class="col-md-7 mt-5">
                <h2 class="text-center mb-2 text-primary">
                    {{$perfil->usuario->name}}
                </h2>
                <a  href="{!! $perfil->usuario->url !!}">Visitar URL</a> 
                <div class="biografia">
                    {!! $perfil->biografia !!}    
                </div>
                {{-- @guest
                <div class="mt-3">
                    <a class="btn btn-outline-primary" href="{{ route('perfil.edit', ['perfil' => Auth::id()])}}">Editar mi perfil</a>
                </div>
                @endguest                --}}
            </div>            
        </div>

    </div>

    @if ( count($recetas)  > 0)
    <h2 class="text-center my-5">Recetas creadas:</h2>

    <div class="container">
        <div class="row mx-auto bg-white p-4">

                    
            @foreach ($recetas as $receta)
                <div class="col-md-3 m-1 mx-auto">
                    <div class="card ">
                        <img src="../storage/{{$receta->imagen}}" class="card-img-top" alt="{{$receta->titulo}}">
                        <div class="card-body">
                            <h3>{{$receta->titulo}}</h3>

                            <a class="btn btn-primary d-block mt-4 text-uppercase" href="{{route('recetas.show', ['receta' => $receta->id])}}">Ver más</a> 
                        </div>
                        
                    </div>
                </div>
            @endforeach

                
        </div>
        <div class="d-flex justify-content-center">
            {{$recetas}}
        </div>
    </div>

    @else

    <p class="text-center my-5">Aún no ha añadido ninguna receta</p>

    @endif
    
@endsection