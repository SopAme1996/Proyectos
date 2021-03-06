@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="tittle">Perfiles</h1>
            @foreach($users as $user)


            <div class="data-user">
                @if($user->image)
                <img class="avatar" src="{{ route('user.avatar', ["filename" => $user->image_name])}}">
                @else
                <img class="avatar"
                    src="https://c0.klipartz.com/pngpicture/266/507/gratis-png-carita-feliz-caras-felices-s-thumbnail.png">
                @endif

                <div class="user-info">
                    <h2>{{'@'.$user->nick}}</h2>
                    <h2>{{ $user->name.' '.$user->surname}} </h2>
                    <p>Se unio: {{ \FormatTime::LongTimeFilter($user->created_at) }}</p>
                    <a href="{{ route('user.profile', ['id'=> $user->id ])}}" class="btn btn-success">Ver
                        perfil</a>
                </div>
            </div>
            @endforeach
            <!-- Paginacion -->
            <div class="clearfix"></div>
            {{$users->links('pagination::bootstrap-4')}}
        </div>

    </div>
</div>
@endsection