@extends ('layouts.admin')
@section('content')

  <h1>Albums</h1>

  @if(count($albums) > 0)

  <?php
    $colcount = count($albums);
    $i = 1;
   ?>

   <div id='albums'>
     <div class="row text-center">
       @foreach($albums as $album)
        @if($i == $colcount)
          <div class="col-md-4 end">
            <a href="albums/{{ $album->id}}">
              <img src="{{ asset('images/'. $album->cover_image)}}" alt="" style="max-width:100%">
            </a>
            <br>
            <h4>{{ $album->title}}</h4>
            @else
            <div class="col-md-4">
              <a href="albums/{{ $album->id}}">
                <img src="{{ asset('images/'. $album->cover_image)}}" alt="" style="max-width:100%">
              </a>
              <br>
              <h4>Album title: {{ $album->title}}</h4>

              @endif
              @if($i % 3 == 0)
            </div></div><div class="row text-center">
              @else
          </div>
          @endif
          <?php $i++; ?>
         @endforeach
     </div>

   </div>
@else
<p>No Albums to display</p>
  @endif

@endsection
