@extends('layouts.app')

@section('content')
 <div class="row border py-3">
   @if (count($galleries) > 0)
   @foreach ($galleries->slice(0, 3) as $gallery)
      <div class=" col-md-4">
        <div class="card">
        <img class="card-img-top" src="{{asset('galleries/'. $gallery->cover)}}" alt="gallery-cover" height="180px">
        <div class="card-body">
          <h5 class="card-title">{{$gallery->title}}</h5>
          <a href="{{route('galleryview',$gallery->id)}}" class="btn btn-primary">Show Gallery Photos</a>
        </div>
      </div>
      </div>
    @endforeach
    @endif
 </div>
 <div><h2 class="text-center mt-4">Gallery Photos</h2></div>
 <br>
  <div class="row border py-3"> 
      @if (count($photos) > 0)
      @foreach ($photos as $photo)
      <div class="col-md-3">
        <a href="{{route('photoview', $photo->id)}}">
        <img class="card-img-top" src="{{asset('galleries/photos/'. $photo->photo)}}" alt="gallery Photo" height="180px">
        <p class="text-muted mt-1">{{$photo->title}}</p>
      </a>
      </div>
      @endforeach
      @endif
  </div>
  <p>{{ $photos->links() }}</p>
@endsection
