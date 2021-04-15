 @if(Auth::user()->image_name)
 <img class="avatar" src="{{ route('user.avatar', ["filename" => Auth::user()->image_name])}}">
 @endif