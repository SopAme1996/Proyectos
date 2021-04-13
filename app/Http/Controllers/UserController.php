<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{

       public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function config(){
        return view('user.config');
    }

    public function update(Request $request){
        //Conseguir usuario identificado
      $user = Auth::user();
      $id = $user->id;

      //Validacion del formulario
      $validate = $this->validate($request,  [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'nick' => ['required', 'string', 'max:255','unique:users,nick,'.$id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'image_path' => ['mimes:jpg,jpeg,png,gif'],
        ]);
        
        //Recoger datos del formulario
      $name = $request->input('name');
      $surname = $request->input('surname');
      $nick = $request->input('nick');
      $email = $request->input('email');

      //Asignar nuevos valores al objeto del usuario
      $user->name = $name;
      $user->surname = $surname;
      $user->nick = $nick;
      $user->email = $email;

      //Subir la imagen
      $image_path = $request->file('image_path');
      
      if($image_path){
          $image_path_full = time().$image_path->getClientOriginalName();
          Storage::disk('users')->put($image_path_full, File::get($image_path));
          $user->image = $image_path_full;
      }

      //Ejecutar consulta en la base de datos
      $user->update();

      return redirect()->route('setting')->with(['message' =>'Usuario actualizado correctamente']);
    }

    public function getImage($fillname){
        $file = Storage::disk('users')->get($fillname);
        return new Response($file, 200);
    }

    public function profile($id){
        $user = User::find($id);
        return view('user.profile', ['user' => $user]);
    }


    public function index($search = null){
        if(!empty($search)){
                $users = User::where('nick', 'LIKE', '%'.$search.'%')->orWhere('name', 'LIKE', '%'.$search.'%')->orWhere('surname', 'LIKE', '%'.$search.'%')->orderBy('id', 'desc')->paginate(5);
        }else{
                $users = User::orderBy('id', 'desc')->paginate(5);
        }
    
        return view('user.index', ['users' => $users]);
     }
}