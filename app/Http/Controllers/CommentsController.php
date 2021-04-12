<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;

class CommentsController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }

    public function save(Request $request){

        $user_id = Auth::user()->id;
        $image_id = $request->input('image_id');
        $content = $request->input('content');

        $validate = $this->validate($request, [
            'image_id' => ['required', 'string'],
            'content' => ['required', 'string'],
        ]
    );

        $comments = new Comment;

        $comments->id = Uuid::generate()->string;
        $comments->user_id = $user_id;
        $comments->image_id = $image_id;
        $comments->content = $content;

        $comments->save();

        return redirect()->route('image.detail', ['id' => $image_id])->with(['message' => 'Comentario guardado correctamente']);
    }

    public function delete($id){
        $comment = Comment::find($id);
        $comment->delete();
       return redirect()->route('image.detail', ['id' => $comment->images->id])->with(['message' => 'Comentario eliminado correctamente']);
    }
}
