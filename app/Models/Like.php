<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likes';
    public $incrementing = false;

    public function users(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function images(){
        return $this->belongsTo('App\Models\Image', 'image_id');
    }
}