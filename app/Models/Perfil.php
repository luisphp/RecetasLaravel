<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

            /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'biografia',
        'imagen',
        'created_at',
        'updated_at'
    ];


    // Relacion 1:1 de pefil con usuario

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
