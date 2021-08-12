<?php

namespace App\Http\Controllers;

use App\Models\Receta;
// use App\Models\Like
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        return Auth::user()->meGusta()->toggle($receta);
    }

}
