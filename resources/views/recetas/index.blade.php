@extends('layouts.app')

@section('botones')
    @include('ui.navegacion')
@endsection

@section('content')
    
<div class="container">
    <h1>Todas Mis Recetas</h1>

    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table" >
            <thead  class="bg-primary text-light">
                <tr>
                    <th scole="col">Titulo</th>
                    <th scole="col">Categorias</th>
                    <th scole="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                
                    @foreach ($recetas as $receta)
                    <tr>
                        <td>
                            {{ $receta->titulo }}
                        </td>
                        <td>
                            {{ $receta->categoria->nombre }}
                        </td>
                        <td>
                            <a class="btn btn-primary d-block mb-1" href="{{ route('recetas.show', ['receta' => $receta->id]) }}" >Ver</a>
                            <a class="btn btn-secondary d-block mb-1" href="{{ route('recetas.edit', ['receta' => $receta->id]) }}">Editar</a>

                            <eliminar-receta
                                receta="{{$receta->id}}"
                                ></eliminar-receta>
                            
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        <div class="col-md-12">
            {{$recetas->onEachSide(5)->links()}}
        </div>
        
    </div>


    @if(  count($usuario->meGusta)  > 0)
    <h2 class="my-5 text-center">Recetas que te gustan: </h2>
        <div class="col-md-10 mx-auto bg-white p-3">
            <ul class="list-group">
                @foreach ($usuario->meGusta as $receta)
                    <li class="list-group-item d-flex justify-content-between align-items-center mt-2">
                        <p>{{$receta->titulo}}</p>
                        <a class="btn btn-outline-primary text-uppercase" href="{{route('recetas.show', ['receta' => $receta->id])}}">Ver</a> 
                    </li>
                @endforeach

            </ul>
        </div>
    @else

        <p class="text-center">Aún no te ha gustado ninguna receta</p>
    @endif


    
    @endsection

</div>

