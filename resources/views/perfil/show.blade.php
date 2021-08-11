@extends('layouts.app')

@section('content')

    {{-- <h1>Perfil del usuario:   {{$perfil->usuario->name}}</h1> --}}


    <div class="container mt-3">
        <div class="row">
            <div class="col-md-5">
                <img src="../storage/{{ $perfil->imagen }}" alt="imagen_actual" style="width: 300px;" class="content-center rounded-circle">
            </div>
            <div class="col-md-7 mt-5">
                <h2 class="text-center mb-2 text-primary">
                    {{$perfil->usuario->name}}
                </h2>
                <a  href="{{$perfil->usuario->url}}">Visitar URL</a> 
                <div class="biografia">
                    {!! $perfil->biografia !!}    
                </div>               
            </div>            
        </div>
        <a href="{{ route('perfil.edit',['perfil' => Auth::user()->id ])  }}" class="btn btn-secondary mr-2 text-white">Editar Mi perfil </a>

    </div>
    
@endsection