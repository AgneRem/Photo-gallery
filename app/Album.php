<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
  protected $fillable = [
    'title',
    'theme_id',
    'description'
    ];

    public function theme(){
      return $this->belongsTo('App\Theme');
    }
}
