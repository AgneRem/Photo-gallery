@extends ('layouts.admin')
@section('content')
<div class="col-md-4">
  <form action="{{ route('theme.update', $theme)}}" method="post">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field()}}
    <div class="form-group">
      <label for="Theme">Theme</label>
      <input type="text" class="form-control" name="title" value="{{ $theme->title}}">
    </div>
    <button type="submit" name="button">Save</button>
  </form>
</div>

@endsection
