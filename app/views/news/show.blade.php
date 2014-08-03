@extends('layouts.default')

@section('content')
<div class="row">
  <div class="col-md-10 col-md-offset-1 top-spacing-big">
    <div class="row text-right">
      @if(Auth::user())
      <a class="btn btn-success" href="{{ URL::route('news.edit', $news->id) }}">Edit</a>
      {{ Form::model($news, array('route' => array('news.destroy', $news->id),  'method' => 'DELETE', 'class' => 'inline')) }}
       {{ Form::submit('Delete', array('class' => 'btn btn-danger') ) }}
      {{ Form::close() }}
      @endif
      <a class="btn btn-primary" href="{{ URL::route('news.index') }}">
        {{ trans('general.go_back') }}
      </a>
    </div>
    <div class="row news-article">
      <h2>
        @if(App::getLocale() == "en")
        {{ $news->title }}
        @else
        {{ $news->guj_title }}
        @endif
      </h2>
      <p class="news-time text-muted">{{ $news->created_at->diffForHumans() }}</p>
      @if($news->image)
        <img class="news-thumbnail" src='{{asset("image/news/$news->image")}}'>
      @endif
      <p class="news-body">
        @if(App::getLocale() == "en")
          {{ $news->body }}
        @else
          {{ $news->guj_body }}
        @endif
      </p>
    </div>
    <div class="row">
      <div id="disqus_thread"></div>
    </div>
  </div>
</div>
@stop