@extends('layouts.app')

@section('botones')
    <a href="{{ route('recetas.create') }}" class="btn btn-primary mr-2 text-white">Crear receta </a>
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
                            {{-- <form class="d-block w-100" action="{{ route('recetas.delete' , ['receta'=> $receta->id]) }}" method="POST"  >
                                @method('DELETE') @csrf --}}
                                {{-- <input 
                                    type="submit" 
                                    class="btn btn-warning d-block w-100  mb-1"
                                    value="Eliminar &times;"/> --}}
                            {{-- </form> --}}
                            <eliminar-receta
                                receta="{{$receta->id}}"
                                ></eliminar-receta>
                            
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>

{{--     
    
    
    <br>
    
    <h1>Categorias</h1>
    @foreach ($categorias as $categoria)
        {{ $categoria->name }} <br>
    @endforeach --}}
    
    @endsection

</div>

