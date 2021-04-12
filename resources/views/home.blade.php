@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('include.mensaje')

            @foreach($images as $image)
            <div class="card home_card">
                <div class="card-header imagenes_home">
                    @include('include.imagen')
                    <a href="{{ route('image.detail', ["id" => $image->id]) }}">
                        {{ $image->users->name.' '.$image->users->surname }}
                        <span class="nickname"> | @ {{ $image->users->nick}}</span>
                    </a>
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
                        <a href="" class="btn btn-sm btn-warning  btn_comments">Comentarios
                            ({{ count($image->comments)}})</a>
                    </div>

                </div>
            </div>
            @endforeach
            <!-- Paginacion -->
            <div class="clearfix"></div>
            {{$images->links('pagination::bootstrap-4')}}
        </div>

    </div>
</div>
@endsection