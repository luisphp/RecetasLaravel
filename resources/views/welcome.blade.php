@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" defer/>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
@endsection

@section('content')
    <h2 class="titulo-categoria text-uppercase mt-5 mb-4">
        Últimas recetas:
    </h2>

    <div class="content">
      <div class="owl-carousel owl-theme">
        @foreach ($recetas as $receta)
        
            <div class="card shadow mb-4">
                <img src="./storage/{{$receta->imagen}}" alt="imagen_receta" class="card-img-top">
            
            <div class="card-body">
              <h3>{{$receta->titulo}}</h3>

              <p class="">{!!  Str::words( strip_tags($receta->preparacion), 20 ) !!}</p>

              <a class="btn btn-outline-primary text-uppercase d-block" href="{{route('recetas.show', ['receta' => $receta->id])}}">Ver</a>
            </div> 
            </div>

        @endforeach

      </div>
      
        @foreach ($recetaCategory as $key => $grupo)
            <div class="container">
                <h2 class="titulo_categoria text-uppercase mt-5 mb-4">{{ str_replace('-',' ', $key) }}</h2>
                
              @foreach ($grupo as $recetasCat)
                  {{-- {{$recetaCat}} --}}

                  @foreach ($recetasCat as $item)
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


              @endforeach

            </div>
        @endforeach
    </div>

@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css" />
<script>
    jQuery(document).ready(function($){
      $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        autoplay: true,
        autoplayHoverPause: true,
        responsive:{
          0:{
            items:1
          },
          600:{
            items:3
          },
          1000:{
            items:3
          }
        }
      })
    })
</script>
@endsection
