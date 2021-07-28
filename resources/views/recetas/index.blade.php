@extends('layouts.app')

@section('botones')
    <a href="{{ route('recetas.create') }}" class="btn btn-primary mr-2 text-white">Crear receta </a>
@endsection

@section('content')
    

<div class="container">
    <h1>Recetas:</h1>

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
                            {{ $receta->nombre }}
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>

    
    
    
    <br>
    
    <h1>Categorias</h1>
    @foreach ($categorias as $categoria)
        {{ $categoria->name }} <br>
    @endforeach
    
    @endsection

</div>

