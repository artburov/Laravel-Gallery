@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h1>Edit image</h1>
                <img src="/{{$editImage}}" class="img-thumbnail" alt="">
                <form action="/update/{{$editImageID}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-control">
                        <input type="file" name="image">
                    </div>

                    <button type="submit" class="btn btn-warning">Edit</button>

                </form>
            </div>
        </div>
    </div>
@endsection
