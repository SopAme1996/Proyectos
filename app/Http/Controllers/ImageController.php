<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Webpatser\Uuid\Uuid;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('image.create');
    }

    public function save(Request $request){
        //Validacion
        $validate = $this->validate($request,  [
            'image_path' => ['required', 'mimes:jpg,jpeg,png,gif'],
            'description' => ['required'],
          ]);

        //obtener datos
        $image_path = $request->file('image_path');
        $description = $request->input('description');

        //guardar imagen en el disco virtual que creamos en el fileSystem.php
          $image = new Image();
        if($image_path){
             $imagen_full_name = time().$image_path->getClientOriginalName();
             Storage::disk('images')->put($imagen_full_name, File::get($image_path));
             $image->image_path = $imagen_full_name;
            }
        
        //Guardamos la informacion
        $image->id = Uuid::generate()->string;
        $image->user_id = Auth::user()->id;
        $image->description = $description;
        $image->save();
        return redirect()->route('home')->with(['message'=>'La publicacion se ha realizado correctamente']);
    }

    public function getImage($filename){
        return new Response(Storage::disk('images')->get($filename), 200);
    }

    public function detail($id){
        $image = Image::find($id);
        return view('image.detail', ['image' => $image]);
    }

    public function delete($id){
        $user = Auth::user();
        $image = Image::find($id);
        $comments = Comment::where('image_id', $id)->get();
        $likes = Like::where('image_id', $id)->get();

        if($user && $image && $image->users->id == $user->id){
            if($comments && count($comments) >= 1){
                foreach($comments as $comment){
                    $comment->delete();
                }
            }

             if($likes && count($likes) >= 1){
                foreach($likes as $like){
                    $like->delete();
                }
            }


            Storage::disk('images')->delete($image->image_path);
            $image->delete();

             $message = array('message' => 'La imagen se ha borrado correctamente');
        }else{
            $message = array('message' => 'La imagen no se ha borrado');
        }
        return redirect()->route('home')->with($message);
    }
}