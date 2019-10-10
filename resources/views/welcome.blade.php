@extends('layout')

@section('content')
    <div class="container">
        <h1 align="center">My Gallery</h1>
        <div class="row">
            @foreach($imagesInView as $image)
                <div class="col-md-3 gallery-item">
                    <div><img src="/{{$image->image}}" class="img-thumbnail" alt=""></div>
                    <div class="button-wrapper">
                        <a href="/show/{{$image->id}}" type="button" class="btn btn-info my-button">Show</a>
                        <a href="/edit/{{$image->id}}" type="button" class="btn btn-warning my-button">Edit</a>
                        <a href="/delete/{{$image->id}}" onclick="return confirm('are you sure?')" type="button"
                           class="btn btn-danger my-button">Delete</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
