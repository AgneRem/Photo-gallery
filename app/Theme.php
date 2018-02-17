<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
    'title'
    ];

    public function albums(){
      return $this->hasMany('App\Album');
    }
}
