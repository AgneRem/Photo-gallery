@extends ('layouts.admin')
@section('content')

<h2>Create new Album</h2>
<form action="{{ route('album.store')}}" method="post" class="col-md-4" enctype="multipart/form-data">
  {{ csrf_field()}}

  <div class="form-group">
    <label for="title">Album name</label>
    <input type="text" name="title" value="" placeholder="Please enter album name" class="form-control" id="title">
  </div>

  <div class="form-group">
    <label for="theme_id">Select theme</label>
    <select class="form-control" id="theme_id" name="theme_id">
      @foreach ($themes as $theme)
      <option value="{{$theme->id}}">{{ $theme->title}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="description">Album description</label>
     <textarea class="form-control" id="description" rows="3" name="description"></textarea>
  </div>


    <input type="submit" name="" value="Submit">


</form>
@endsection
