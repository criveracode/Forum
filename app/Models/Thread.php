<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'body'
    ];
    
    //Una pregunta pertenece a un usuario.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Una pregunta pertenece a una categoria.
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //Una pregunta tiene muchas respuestas.
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
