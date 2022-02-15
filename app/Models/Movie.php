<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function genre()
    {
        // return $this->belongsToMany(Genre::class, 'genre_movie');
        return $this->belongsToMany(Genre::class);
    }

    protected $fillable = [
        'movie_name',
        'movie_description',
    ];
}
