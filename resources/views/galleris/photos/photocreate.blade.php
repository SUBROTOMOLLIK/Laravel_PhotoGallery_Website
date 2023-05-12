@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Photo</div>
                <div class="card-body">
                    <form action="{{route('photostore')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="title">Photo Title</label>
                                <input type="text" name="title" class="form-control" id="title">
                            </div>
                            {{-- hidden field that here passing 'gallery id' --}}
                            <input type="hidden" name="gallery_id" value="{{$gallery->id}}" >

                            <div class="col-md-6">
                                <label for="img">New Photo</label>
                                <input type="file" name="photo" class="form-control" id="img">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="desc">Photo Description</label>
                                <textarea name="desc" id="desc" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Create Photo</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection