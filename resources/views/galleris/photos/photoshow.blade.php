@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{$photo->title}}</div>
                <div class="caed-body p-2">
                    <img src="{{asset('galleries/photos/'. $photo->photo)}}" alt="gallery-cover" width="100%">
                    <br><br>
                                       
                    <a href="{{route('photoedit', $photo->id)}}" role="button" class="btn btn-success btn-block my-2">Edit Photo</a>
           
                    <a href="{{route('photodelete', $photo->id)}}" role="button" class="btn btn-danger btn-block">Delete Photo</a>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-capitalize">Gallery Photo Details</div>
                <div class="caed-body">
                   <img class="p-1" src="{{asset('galleries/photos/' . $photo->photo)}}" alt="photo" height="80%vh" width="100%">
                   <br><br>
                   <p class="text-muted p-1 fw-bold">{{$photo->description}}</p>
                </div>
            </div>
        </div>

    </div>
@endsection