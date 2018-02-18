@extends ('layouts.admin')
@section('content')
<div class="col-md-8">
  @if (session('message'))
  <div class="alert alert-danger">
    {{ session('message')}}
  </div>
  @endif

<h1>List of albums</h1>

  <ul>
      @foreach ($albums as $album)
      <div class="row list-group">
        <li class="list-group-item col-md-8">{{ $album->title }}
          <form action="{{ route('albums.destroy', $album) }}" method="POST" style="display: inline" onsubmit="return confirm('Are you sure?');">
          <input type="hidden" name="_method" value="DELETE">
           {{ csrf_field() }}
           <button class="btn btn-danger pull-right">Delete</button>
          </form>
          <a href="#" class="btn btn-success pull-right">Add pictures</a>
          <a href="{{ route('albums.edit', $album)}}" class="btn btn-primary col-md-2 pull-right">Edit</a>
        </li>
        <div class="">
          <a href="#" class="thumbnail"><img src="/public/image/{{ $album->cover_image}}" style="height: 100px"alt=""></a>
        </div>
      </div>
      @endforeach

  </ul>
  <a href="{{ route ('admin')}}" class="btn btn-default">Atgal</a>
  <a href="{{ route('albums.create')}}" class="btn btn-success">Prideti</a>

</div>
@endsection
