@extends('layouts.default')
@section('stylesheets')
  {{ HTML::style('css/blueimp-gallery.min.css') }}
  {{ HTML::style('css/bootstrap-image-gallery.css') }}
@stop
@section('content')
  <div class="row top-spacing-big">
    @if(Auth::user())
    <div class="col-md-10 col-md-offset-1 text-right">
      <a href="{{URL::route('gallery.edit',$album->id)}}" class="btn btn-primary">
        Edit
      </a>
      {{ Form::model($album, array('route' => array('gallery.destroy', $album->id), 'method' => 'DELETE', 'class' => 'inline')) }}
        {{ Form::Submit('Delete', array('class' => 'btn btn-default')) }}
      {{ Form::close() }}
    </div>
    @endif
    <div class="col-md-10 col-md-offset-1">
      @if(App::getLocale() == "en")
      <h2>{{ $album->name }}</h2>
      @else
      <h2>{{ $album->guj_name }}</h2>
      @endif
      <div class="row top-spacing" id="links">
        @foreach($album->albumsPhotos as $i => $photo)
          @if( $i % 4 == 0 && $i != 0)
            </div><div class="row top-spacing">
          @endif
          <div class="col-md-3 album-photo-container">
            @if( Auth::user() )
              {{ Form::model($photo, array('route' => array('albumPhotos.destroy', $photo->id), 'method' => 'delete', 'class' => 'album-delete-form')) }}
                {{ Form::hidden('id', $photo->id) }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-xs')) }}
              {{ Form::close() }}
            @endif
            <?php
              $pageNo = $i + 1;
              $photoUrl = "gallery/".$album->id."/photos?page=".$pageNo;
            ?>
            <a href='{{ URL::to($photoUrl) }}' class="thumbnail">
              <img src='{{ asset("image/gallery/$photo->filename") }}'>
            </a>
          </div>
        @endforeach
      </div>
      <div class="row">
        <div id="disqus_thread"></div>
      </div>
    </div>
  </div>
@stop