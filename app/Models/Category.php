<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Una categoria tendra muchas preguntas.
    public function Threads()
    {
        return $this->hasMany(Thread::class);
    }
}
