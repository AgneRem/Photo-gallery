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
          <form action="{{ route('album.destroy', $album) }}" method="POST" style="display: inline" onsubmit="return confirm('Are you sure?');">
          <input type="hidden" name="_method" value="DELETE">
           {{ csrf_field() }}
           <button class="btn btn-danger pull-right">Delete</button>
          </form>
          <a href="{{ route('album.edit', $album)}}" class="btn btn-primary col-md-2 pull-right">Edit</a>
        </li>
      </div>
      @endforeach

  </ul>
  <a href="{{ route ('admin')}}" class="btn btn-default">Atgal</a>
  <a href="{{ route('album.create')}}" class="btn btn-success">Prideti</a>

</div>
@endsection
