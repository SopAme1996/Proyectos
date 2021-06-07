@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('include.mensaje')

            @foreach($images as $image)
            @include('include.publicacion', ['image' => $image])
            @endforeach
            <!-- Paginacion -->
            <div class="clearfix"></div>
            {{$images->links('pagination::bootstrap-4')}}
        </div>

    </div>
</div>
@endsection