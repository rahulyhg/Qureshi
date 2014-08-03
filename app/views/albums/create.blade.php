@extends('layouts.default')

@section('content')
<link rel="stylesheet" href="/assets/css/datepicker3.css">
<div class="row top-spacing-big">
  <div class="col-md-10 col-md-offset-1">
    {{ Form::model(null, array('route' => 'gallery.store', 'class' => 'form-horizontal', 'files' => true) ) }}
      <div class="form-group">
        {{ Form::label('name', 'Album Name', array('class' => 'col-md-2 control-label') ) }}
        <div class="col-md-10">
          {{ Form::text('name', null,array('class' => 'form-control', 'placeholder' => 'Album name', 'id' => 'name') ) }}
          {{ Form::first_field_error("name") }}
        </div>
      </div>
      <div class="form-group">
        {{ Form::label('guj_name', 'Album Name(In Gujarati)', array('class' => 'col-md-2 control-label') ) }}
        <div class="col-md-10">
          {{ Form::text('guj_name', null,array('class' => 'form-control', 'placeholder' => 'Album name', 'id' => 'guj_name') ) }}
          {{ Form::first_field_error("guj_name") }}
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('event_date', 'Event Date', array('class' => 'col-md-2 control-label') ) }}
        <div class="col-lg-3">
          {{ Form::text('date', null,array('class' => 'form-control', 'placeholder' => 'Select Date', 'id' => 'event_date') ) }}
          {{ Form::first_field_error("date") }}
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('caption', 'Description', array('class' => 'col-md-2 control-label') ) }}
        <div class="col-md-10">
          {{ Form::textarea('caption', null,array('class' => 'form-control', 'placeholder' => 'Write about event', 'id' => 'event_caption') ) }}
          {{ Form::first_field_error("caption") }}
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('guj_caption', 'Event Description(In gujarati)', array('class' => 'col-md-2 control-label') ) }}
        <div class="col-md-10">
          {{ Form::textarea('guj_caption', null,array('class' => 'form-control', 'placeholder' => 'Write about event', 'id' => 'guj_event_caption') ) }}
          {{ Form::first_field_error("guj_caption") }}
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('files', 'Image files', array('class' => 'col-md-2 control-label') ) }}
        <div class="col-md-4">
          {{ Form::file('files[]', array('class' => 'form-control', 'id' => 'files', 'multiple' => 'multiple') ) }}
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-10 col-md-offset-2">
          {{ Form::submit('Make Album', array('class' => 'btn btn-primary') ) }}
          <a class="btn btn-default" href="{{ URL::route('gallery.index') }}">Back</a>
        </div>
      </div>
    {{ Form::close() }}
  </div>
</div>
@stop

@section('scripts')
<script type="text/javascript" src="/assets/js/bootstrap-datepicker.js"></script>
<script>
  $('#event_date').datepicker();
</script>
@stop