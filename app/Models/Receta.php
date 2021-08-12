<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Receta extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'ingredientes',
        'preparacion',
        'categoria_id',
        'user_id',
        'imagen',
        'created_at',
        'updated_at'
    ];



    //Obtener la categoria de la receta via FK
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    //Obtiene la informacion del usuario via FK
    public function autor()
    {
        return $this->belongsTo(user::class, 'user_id');
    }

    //likes que ha recibido la receta
    public function likes ()
    {
        return $this->belongsToMany(User::class, 'likes_receta');
    }
}
