<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $guarded = [
      'category',
    ];


    public function children()
    {
        return $this->hasMany(self::class, 'paren_id');
    }

    public function film()
    {
        return $this->belongsToMany(Film::class, 'film_genre', 'genre_id', 'film_id');
    }
}
