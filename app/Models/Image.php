<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = "images";

    //Relacion One To Many / de uno a muhcos
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

      //Relacion One To Many / de uno a muhcos
      public function likes(){
          return $this->hasMany('App\Models\Like');
      }

      //Relacion Many To One
      public function users(){
          return $this->belongsTo('App\Models\User', 'user_id');
      }

}
