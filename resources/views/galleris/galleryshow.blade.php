@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-capitalize">Gallery Photos</div>
                <div class="caed-body">
                    <div class="mt-3">
                        <p class="text-muted p-1 fw-bold">{{$gallery->desc}}</p>
                    </div>
                    <div class="row p-1">
                        @foreach($photos as $photo)
                            <div class="col-md-3 mb-3">
                                <a href="{{route('photoshow', $photo->id)}}"><img src="{{asset('galleries/photos/' . $photo->photo)}}" alt="photo" width="100%" height="100%vh"></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{$gallery->title}}</div>
                <div class="caed-body p-2">
                    <img src="{{asset('galleries/'. $gallery->cover)}}" alt="gallery-cover" width="100%">
                    <br><br>
                    <a href="{{route('photocreate', $gallery->id)}}" role="button" class="btn btn-primary btn-block">Upload Photo</a>
                    
                    <a href="{{route('galleryedit', $gallery->id)}}" role="button" class="btn btn-success btn-block my-2">Edit Gallery</a>
           
                    <a href="{{route('gallerydelete', $gallery->id)}}" role="button" class="btn btn-danger btn-block">Delete Gallery</a>
                </div>
            </div>
        </div>
    </div>
@endsection