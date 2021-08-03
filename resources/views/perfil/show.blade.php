@extends('layouts.app')

@section('content')

    {{-- <h1>Perfil del usuario:   {{$perfil->usuario->name}}</h1> --}}

    <div class="container">
        <div class="row">
            <div class="col-md-5">

            </div>
            <div class="col-md-7">
                <h2 class="text-center mb-2 text-primary">
                    {{$perfil->usuario->name}}
                </h2>
                <a  href="{{$perfil->usuario->url}}">Visitar URL</a> 
                <div class="biografia">
                    {!! $perfil->biografia !!}    
                </div>               
            </div>            
        </div>
    </div>
    
@endsection