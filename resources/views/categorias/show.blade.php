@extends('layouts.app')

@section('content')

    @if ( count($recetas)  > 0  )
    <h2>Categoria: {{$recetas[0]->categoria->nombre}}</h2>

    <div class="container">
        <div class="row">
            @foreach ($recetas as $receta)
                <div class="col-md-4 col-sm-12 mt-5">
                    <div class="card shadow mb-4">
                        <img src="../storage/{{$receta->imagen}}" alt="imagen_receta" class="card-img-top">
                        <div class="card-body">

                            <h3>{{$receta->titulo}}</h3>

                            <p class="">{!!  Str::words( strip_tags($receta->preparacion), 20 ) !!}</p>

                            <a class="btn btn-outline-primary text-uppercase d-block" href="{{route('recetas.show', ['receta' => $receta->id])}}">Ver</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{$recetas->onEachSide(5)->links()}}
        </div>
    </div>

    @else
        <h3>Aún no se han cargado recetas en esta categoría</h3>
    @endif


@endsection