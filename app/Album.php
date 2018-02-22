<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
  protected $fillable = [
    'title',
    'theme_id',
    'description',
    'cover_image'
    ];

    public function theme(){
      return $this->belongsTo('App\Theme');
    }

    public function photos(){
      return $this->hasMany('App\Photo');
    }
}
