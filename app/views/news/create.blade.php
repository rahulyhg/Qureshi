@extends('layouts.default')

@section('content')

<div class="row top-spacing-big">
  <div class="col-md-10 col-md-offset-1">
    {{ Form::model(null, array('route' => 'news.store', 'class' => 'form-horizontal', 'files' => true) ) }}
    <legend>Create News</legend>
      @include('news._form')
      <div class="form-group">
        <div class="col-md-10 col-md-offset-2">
          {{ Form::submit('Post News', array('class' => 'btn btn-primary') ) }}
          <a class="btn btn-warning" href="{{ URL::route('news.index') }}">Back</a>
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