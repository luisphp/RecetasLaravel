@extends('layouts.app')
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
                <tr>
                    @foreach ($recetas as $receta)
                        {{ $receta->name }}
                    @endforeach
                </tr>
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

