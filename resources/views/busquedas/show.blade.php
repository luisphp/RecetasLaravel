@extends('layouts.app')

@section('content')

    @if (count($resultados) > 0)

    <h3> Los resultados de tu busquda ( {{$busqueda}} ), son: </h3>

    @foreach ($resultados as $item)
        <div class="col-md-4 mt-4">
            <div class="card shadow">
                <img src="./storage/{{$item->imagen}}" alt="imagen_receta" class="card-img-top">
                <h3>{{$item->titulo}}</h3>
                <div class="card-body">
                <p class="">{!!  Str::words( strip_tags($item->preparacion), 20 ) !!}</p>
                <p class="text-primary font-weight-bold">
                    Fecha:  @php echo date("F jS, Y", strtotime($item->created_at)) @endphp 
                </p>

                <a class="btn btn-outline-primary text-uppercase d-block" href="{{route('recetas.show', ['receta' => $item->id])}}">Ver</a>
                </div>
            </div>
        </div>
    @endforeach
        
    @else

    <h4>No tenemos resultados para tu busqueda</h4>

    @endif


@endsection