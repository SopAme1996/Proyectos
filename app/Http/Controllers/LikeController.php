<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;

class LikeController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function like($image_id){

        $isset_like = Like::where('user_id', Auth::user()->id)->where('image_id', $image_id)->count();

        if($isset_like == 0){
        $like = new Like();
        $like->id = Uuid::generate()->string;
        $like->user_id = Auth::user()->id;
        $like->image_id = $image_id;
        $like->save();
        return response()->json(['like' => $like]);
        }else{
             return response()->json(['message' => 'El like ya existe']);
        }
        
    }

    public function dislike($image_id){
        $like = Like::where('user_id', Auth::user()->id)->where('image_id', $image_id)->first();

        if($like){
        $like->delete();
        return response()->json(['like' => $like]);
        }else{
             return response()->json(['message' => 'El like no existe']);
        }
    }

    public function likes(){
        $likes = Like::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('like.likes', ['likes' => $likes]);
    }
}
