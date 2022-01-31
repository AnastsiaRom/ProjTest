<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $guarded = [];


    public function children(){
        return $this->hasMany(self::class, 'paren_id');
    }
}
