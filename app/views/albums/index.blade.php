@extends('layouts.default')

@section('content')
  <div class="row top-spacing-big">
    @if(Auth::user())
      <div class="col-md-10 col-md-offset-1 text-right">
        <a class="btn btn-primary" href="{{ URL::route('gallery.create') }}">Add Album</a>
      </div>
    @endif
    <div class="col-md-10 col-md-offset-1">
      <div class="row top-spacing-big">
        @foreach($albums as $i => $album)
          @if( $i % 2 == 0 && $i != 0)
            </div><div class="row top-spacing-big">
          @endif
          <div class="col-md-5 {{ $i%2 != 0 ? 'col-md-offset-2' : '' }}">
            <div class="thumbnail">
              <div class="gallery-album-cover">
                @foreach($album->albumsPhotos->take(3) as $photo)
                  <img src='{{ asset("image/gallery/$photo->filename") }}'>
                @endforeach
              </div>

              <div class="caption">
                <h3 class="text-center">
                  @if(App::getLocale() == "en")
                  <a href="{{ URL::route('gallery.show', $album->id) }}">
                    {{ $album->name }}
                  </a>
                  @else
                  <a href="{{ URL::route('gallery.show', $album->id) }}">
                    {{ $album->guj_name }}
                  </a>
                  @endif
                </h3>
                @if(App::getLocale() == "en")
                  <p>{{ $album->caption or "" }}</p>
                @else
                  <p>{{ $album->guj_caption or "" }}</p>
                @endif

                @if(Auth::user())
                  <div class="row">
                    <div class="col-md-6">
                      <a href="{{URL::route('gallery.edit',$album->id)}}" class="btn btn-primary">
                        Edit
                      </a>
                    </div>
                    <div class="col-md-6 text-right">
                      {{ Form::model($album, array('route' => array('gallery.destroy', $album->id), 'method' => 'DELETE')) }}
                        {{ Form::Submit('Delete', array('class' => 'btn btn-default')) }}
                      {{ Form::close() }}
                    </div>
                  </div>
                @endif
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <div class="text-right">
      <?php echo $albums->links(); ?>
    </div>
  </div>
@stop

@section('scripts')
  <script type="text/javascript" src="/assets/js/jquery.cycle.all.js"></script>
  <script>
    $('.gallery-album-cover').cycle();
  </script>
@stop