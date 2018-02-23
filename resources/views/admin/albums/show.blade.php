@extends ('layouts.admin')
@section('content')

<div class="row">
  <div class="col-md-4">
    <p>Album title: {{ $album->title}}</p>
    <p>Description: {{ $album->description}}</p>
    <p>Theme: {{ $album->theme->title}}</p>
  </div>
  <div class="col-md-8">
    <a href="/admin/albums" class="btn btn-primary">Go back to albums</a>
    <a href="/admin/photos/create/{{$album->id}}" class="btn btn-success">Add photos to this album</a>
  </div>
</div>
<hr>

@foreach ($album->photos as $photo)

  <div class="row">
    <div class="col-md-8">
      <img src="{{ asset('images/'. $photo->photo)}}" alt="" style="max-width: 100%">
    </div>
    <div class="col-md-4">
      <form action="{{ route('photos.destroy', $photo)}}" method="POST" style="display: inline" onsubmit="return confirm('Are you sure?');">
      <input type="hidden" name="_method" value="DELETE">
       {{ csrf_field() }}
       <button class="btn btn-danger pull-right">Delete Photo</button>
      </form>

    </div>
  </div>

@endforeach

@endsection
