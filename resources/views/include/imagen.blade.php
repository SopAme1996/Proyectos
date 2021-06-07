 @if(Auth::user()->image_name)
 <img class="avatar" src="{{ route('user.avatar', ["filename" => Auth::user()->image_name])}}">
 @else
 <img class="avatar"
     src="https://c0.klipartz.com/pngpicture/266/507/gratis-png-carita-feliz-caras-felices-s-thumbnail.png">
 @endif