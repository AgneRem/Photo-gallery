@extends ('layouts.admin')
@section('content')

<h2>Upload photos</h2>
<form action="{{ route('photos.store')}}" method="post" class="col-md-4" enctype="multipart/form-data">
  {{ csrf_field()}}

    <div class="form-group">
      <label for="photo">Add photos to this album</label>
      <input type="file" name="photo" value="" placeholder="Please select a picture" class="form-control" id="photo">
    </div>
    <div class="form group">
      <input type="hidden" name="album_id" value="{{ $album_id}}">
    </div>


    <input type="submit" name="" value="Submit">


</form>
@endsection
