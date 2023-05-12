@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Gallery Photo</div>
                <div class="card-body">
                    <form action="{{route('photoupdate', $photo->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="title">Gallery Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{$photo->title}}">
                            </div>
                            <div class="col-md-6">
                                <label for="img">Gallery  Photo</label>
                                <input type="file" class="form-control" name="photo" id="img">
                                <input type="hidden" value="{{$photo->photo}}" name="old_photo">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="desc">Photo Description</label>
                                <textarea name="desc" id="desc" class="form-control" rows="3">{{$photo->description}}</textarea>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Update Photo</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection