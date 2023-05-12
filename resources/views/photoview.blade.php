@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-capitalize"><h4>{{$photo->title}}</h4></div>
                <div class="caed-body">
                   <img class="p-1" src="{{asset('galleries/photos/' . $photo->photo)}}" alt="photo" height="80%" width="100%">
                   <br><br>
                   <p class="text-muted p-1 fw-bold">{{$photo->description}}</p>
                </div>
            </div>
        </div>

    </div>
@endsection
