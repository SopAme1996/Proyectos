  <div class="card home_card">
      <div class="card-header imagenes_home">
          @if($image->users->image_name)
          <img class="avatar" src="{{ route('user.avatar', ["filename" => $image->users->image_name]) }}" />
          @else
          <img class="avatar"
              src="https://c0.klipartz.com/pngpicture/266/507/gratis-png-carita-feliz-caras-felices-s-thumbnail.png">
          @endif
          <a href="{{route('user.profile', ['id' => $image->users->id]) }}">
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
              <a href="{{ route('image.detail', ["id" => $image->id])}}" class="btn btn-sm btn-warning  btn_comments">
                  Comentarios
                  ({{ count($image->comments)}})
              </a>
          </div>

      </div>
  </div>