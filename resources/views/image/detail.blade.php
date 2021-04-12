@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('include.mensaje')
            <div class="card home_card">
                <div class="card-header imagenes_home">
                    @include('include.imagen'){{ $image->users->name.' '.$image->users->surname }}
                    <span class="nickname"> | @ {{ $image->users->nick}}</span>
                </div>

                <div class="card-body">
                    <figure class="imagen_publicada">
                        <img src="{{ route('image.publicacion', ['filename' => $image->image_path ]) }}" />
                    </figure>

                    <div class="description">
                        <span
                            class='nickname'>{{'@'.$image->users->nick.' | '.\FormatTime::LongTimeFilter($image->created_at)}}</span>
                        <p>{{$image->description}}</p>
                    </div>

                    <div class="likes col-md-4">
                        <?php $user_like = false;  ?>

                        @foreach($image->likes as $like)

                        @if($like->users->id == Auth::user()->id)
                        <?php $user_like = true;  ?>
                        @endif
                        @endforeach

                        @if($user_like)
                        <img src="{{asset('img/red.ico')}}" data-id="{{$image->id}}" class="btn-dislike">
                        @else
                        <img src="{{asset('img/black.ico')}}" data-id="{{$image->id}}" class="btn-like">
                        @endif
                        <span class="count-like">{{ count($image->likes) }}</span>

                        @if(Auth::user() && Auth::user()->id == $image->user_id)
                        <div class="actions">
                            <a href="" class="btn btn-sm btn-primary">Actualizar</a>
                            <!-- Button trigger modal  Delete-->
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                Eliminar
                            </button>

                            @include('include.modal', ['title' => 'Esta seguro de eliminar esta publicacion?',
                            'message' =>'Se eliminara la imagen, comentarios y likes de esta publicacion en nuestro
                            sistema',
                            'close' => 'Cerrar',
                            'done' => 'Aceptar',
                            ])

                        </div>
                        @endif
                    </div>




                    <div class="comments">
                        <h2>Comentarios ({{count( $image->comments) }})</h2>
                        <hr />

                        <form action="{{ route('comments.detail') }}" method="post">
                            @csrf
                            <input type="hidden" name="image_id" value="{{ $image->id }}">

                            <p>
                                <textarea name="content" id="content" cols="30" rows="10"
                                    class="form-control {{ $errors->has('content') ? 'is-invalid' : ''}}"></textarea>
                                @if($errors->has('content'))
                                <span class="invalid-feedback" role="alert">{{$errors->first('content')}}</span>
                                @endif
                            </p>
                            <input type="submit" value="Enviar" class="btn btn-success">
                        </form>

                        @foreach($image->comments as $comment)
                        <div
                            class="comentario {{Auth::check() && $comment->user_id == Auth::user()->id ? 'format' : ''}}">
                            @if(Auth::check() && $comment->user_id == Auth::user()->id)
                            <a href="{{ route('comment.delete', ['id' => $comment->id]) }}"><i
                                    class="fas fa-plus-circle"></i></a>
                            @endif
                            <div>
                                <span
                                    class='nickname'>{{'@'.$comment->users->nick.' | '.\FormatTime::LongTimeFilter($comment->created_at)}}</span>
                                <p>{{$comment->content}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection