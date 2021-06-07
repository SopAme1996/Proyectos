@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="margen">Mis imagenes favoritas</h1>
            <hr>
            @foreach($likes as $like)
             @include('include.publicacion', ['image' => $like->images])
            @endforeach
            <!-- Paginacion -->
            <div class="clearfix"></div>
            {{$likes->links('pagination::bootstrap-4')}}
        </div>

    </div>
</div>
@endsection