@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Gallery</div>
                <div class="card-body">
                    <form action="{{route('galleryupdate', $gallery->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="title">Gallery Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{$gallery->title}}">
                            </div>
                            <div class="col-md-6">
                                <label for="img">Gallery Cover Photo</label>
                                <input type="file" class="form-control" name="cover" id="img">
                                <input type="hidden" value="{{$gallery->cover}}" name="old_cover">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="desc">Gallery Description</label>
                                <textarea name="desc" id="desc" class="form-control" rows="3">{{$gallery->desc}}</textarea>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Update gallery</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection