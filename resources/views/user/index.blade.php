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
                @endif

                <div class="user-info">
                    <h2>{{'@'.$user->nick}}</h2>
                    <h2>{{ $user->name.' '.$user->surname}} </h2>
                    <p>Se unio: {{ \FormatTime::LongTimeFilter($user->created_at) }}</p>
                    <a href="{{ route('user.profile', ['id'=> $user->id ])}}" class="btn btn-success">Ver
                        perfil</a>
                </div>
            </div>

            @foreach($user->images as $image)
            @include('include.publicacion', ['image' => $image])
            @endforeach

            @endforeach
            <!-- Paginacion -->
            <div class="clearfix"></div>
            {{$users->links('pagination::bootstrap-4')}}
        </div>

    </div>
</div>
@endsection