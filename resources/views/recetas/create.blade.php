@extends('layouts.app')

@section('botones')
    <a  href="{{ route('recetas.create') }}" class="btn btn-primary mr-2 text-white">Crear receta </a>
@endsection

@section('content')
    

<div class="container">
    <h1> Crear nueva recetas:</h1>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action="{{ route('recetas.store') }}" >
                @csrf
                <div class="form-group">
                    <label for="titulo">Titulo Receta</label>
                    <input type="text" 
                            name="titulo" 
                            id="titulo" 
                            class="form-control" 
                            placeholder="titulo de tu receta" />

                </div>
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

</div>

