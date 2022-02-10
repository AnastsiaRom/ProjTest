<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
  protected $fillable = [
    'title',
    'description',
    'link',
  ];

  public function genres()
  {
    return $this->belongsToMany(Genre::class, 'film_genre', 'film_id', 'genre_id');
  }

  public function user()
  {
    return $this->belongsTo(User::class, 'id', 'user_id');
  }
}
