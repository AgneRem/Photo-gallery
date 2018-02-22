@extends ('layouts.admin')
@section('content')



<div class="row">
  <div class="col-md-4">
    <p>Album title: {{ $album->title}}</p>
    <p>Description: {{ $album->description}}</p>
    <p>Theme: {{ $album->theme->title}}</p>
  </div>

  <div class="col-md-8">
    <div class="row">

      <form class="col-md-6" action="{{ route('photos.store', $album)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field()}}
        <div class="form-group">
          <label for="photo">Add album pictures</label>
          <input type="file" name="photo" value="" placeholder="Please select a picture" class="form-control" id="photo">
        </div>
        <div class="col-md-6">
          <input type="submit" name="" value="Submit">
        </div>
      </form>

    </div>

    <br>

</div>
<div class="container">
  <h3>Album pictures:</h3>
  @foreach($photos as $photo)
  <div class="">
    <img src="{{ asset('images/' . $photo->photo)}}" alt="">
  </div>

  <form action="{{ route('photos.destroy', $photo->id)}}" method="POST" style="display: inline" onsubmit="return confirm('Are you sure?');">
  <input type="hidden" name="_method" value="DELETE">
   {{ csrf_field() }}
   <button class="btn btn-danger">Delete</button>
  </form>
  @endforeach
</div>
</div>

@endsection
