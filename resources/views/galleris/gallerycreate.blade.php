@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Gallery</div>
                <div class="card-body">
                    <form action="{{route('gallerystore')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="title">Gallery Title</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>
                            <div class="col-md-6">
                                <label for="img">Gallery Cover Photo</label>
                                <input type="file" class="form-control" name="cover" id="img">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="desc">Gallery Description</label>
                                <textarea name="desc" id="desc" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Create gallery</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection