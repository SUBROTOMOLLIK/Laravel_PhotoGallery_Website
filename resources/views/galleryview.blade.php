@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card ">
                <div class="card-header text-capitalize"> Gallery Photos </div>
                <div class="caed-body">
                    <div class="row pt-3 px-2 ">
                        @foreach($photos as $photo)
                            <div class="col-md-3 mb-3">
                                <img src="{{asset('galleries/photos/' . $photo->photo)}}" alt="photo" width="100%" height="100%vh">
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-3">
                        <p class="text-muted p-1 fw-bold">{{$gallery->desc}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
