<div class="form-group">
  {{ Form::label('title', 'News title', array('class' => 'col-md-2 control-label') ) }}
  <div class="col-md-10">
    {{ Form::text('title', null,array('class' => 'form-control', 'placeholder' => 'News title', 'id' => 'title') ) }}
    {{ Form::first_field_error('title') }}
  </div>
</div>
<div class="form-group">
  {{ Form::label('guj_title', 'News title(In gujarati)', array('class' => 'col-md-2 control-label') ) }}
  <div class="col-md-10">
    {{ Form::text('guj_title', null,array('class' => 'form-control', 'placeholder' => 'News title', 'id' => 'guj_title') ) }}
    {{ Form::first_field_error('guj_title') }}
  </div>
</div>

@if( empty($news) || is_null($news->image) )
<div class="form-group">
  {{ Form::label('image', 'News Image', array('class' => 'col-md-2 control-label') ) }}
  <div class="col-md-10">
    {{ Form::file('image', null,array('class' => 'form-control', 'id' => 'image') ) }}
  </div>
</div>
@else
<div class="form-group">
  {{ Form::label('image', 'News Image', array('class' => 'col-md-2 control-label') ) }}
  <div id="news-thumbnail-container" class="col-md-4">
    <div class="thumbnail">
      {{ Form::hidden('image', $news->image) }}
      <img src='{{ asset("image/news/$news->image") }}'>
      <div class="caption">
        <a id="removeThumbnail" href="#" class="btn btn-primary" role="button">Remove</a>
      </div>
    </div>
  </div>
</div>
@endif

<div class="form-group">
  {{ Form::label('body', 'News Description', array('class' => 'col-md-2 control-label') ) }}
  <div class="col-md-10">
    {{ Form::textarea('body', null,array('class' => 'form-control', 'id' => 'body') ) }}
    {{ Form::first_field_error('body') }}
  </div>
</div>
<div class="form-group">
  {{ Form::label('guj_body', 'News Description(In gujarati)', array('class' => 'col-md-2 control-label') ) }}
  <div class="col-md-10">
    {{ Form::textarea('guj_body', null,array('class' => 'form-control', 'id' => 'guj_body') ) }}
    {{ Form::first_field_error('guj_body') }}
  </div>
</div>