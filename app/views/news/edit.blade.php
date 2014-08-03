@extends('layouts.default')

@section('content')
<div class="row top-spacing-big">
  <div class="col-md-10 col-md-offset-1">
    {{ Form::model($news, array('route' => array('news.update', $news->id), 'class' => 'form-horizontal', 'method' => 'PUT', 'files' => true) ) }}
      @include('news._form')
      <div class="form-group">
        <div class="col-md-10 col-md-offset-2">
          {{ Form::submit('Update News', array('class' => 'btn btn-primary') ) }}
          <a class="btn btn-default" href="{{ URL::route('news.show', $news->id) }}">Back</a>
        </div>
      </div>
    {{ Form::close() }}
  </div>
</div>
@stop

@section('scripts')
<script>
  $('#removeThumbnail').on('click', function(e) {
    e.preventDefault();
    $newsThumnailContainer = $('#news-thumbnail-container').empty();
    $newsThumnailContainer.append(function(){
      return '<input name="image" type="file">';
    });
  });
</script>
@stop