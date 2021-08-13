@extends('layouts.app')

@section('styles')
    
@endsection

@section('content')
    <h2 class="titulo-categoria text-uppercase mt-5 mb-4">
        Últimas recetas:
    </h2>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($recetas as $receta)
            <div class="carousel-item">
                <img src="..." alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <img class="d-block w-100" src="..." alt="First slide">
                    {{-- <h5>{{$receta->titulo}}</h5> --}}
                    {{-- <p>{{$receta}}</p> --}}
                    Hello
                </div>
              </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
@endsection