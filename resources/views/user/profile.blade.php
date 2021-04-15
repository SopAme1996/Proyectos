@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="data-user">
                @if($user->image)
                <img class="avatar" src="{{ route('user.avatar', ["filename" => $user->image_name])}}">
                @endif

                <div class="user-info">
                    <h1>{{'@'.$user->nick}}</h1>
                    <h2>{{ $user->name.' '.$user->surname}} </h2>
                    <p>Se unio: {{ \FormatTime::LongTimeFilter($user->created_at) }}</p>
                </div>
            </div>

            @foreach($user->images as $image)
            @include('include.publicacion', ['image' => $image])
            @endforeach
        </div>

    </div>
</div>
@endsection