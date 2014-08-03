@extends('layouts.default')

@section('content')

<div class="row top-spacing-big">
  @if(Auth::user())
    <div class="col-md-10 col-md-offset-1 text-right">
      <a class="btn btn-primary" href="{{ URL::route('news.create') }}">Add news</a>
    </div>
  @endif
  <div class="col-md-10 col-md-offset-1 top-spacing">
    @foreach($news as $currentNews)
      <div class="row news-article">
        <h2>
          <a href="{{ URL::route('news.show', $currentNews->id) }}">
            @if(App::getLocale() == "en")
              {{ $currentNews->title }}
            @else
              {{ $currentNews->guj_title }}
            @endif
          </a>
        </h2>
        <p class="news-time text-muted">{{ $currentNews->created_at->diffForHumans() }}</p>
        @if($currentNews->image)
          <img class="news-thumbnail" src='{{asset("image/news/$currentNews->image")}}'>
        @endif
        <p class="news-body">
          {{ $currentNews->overview_text }}
        </p>
        <a class="pull-right btn btn-default" href="{{URL::route('news.show',$currentNews->id) }}">
          <em>{{ trans('general.read_more') }}</em>
        </a>
      </div>
    @endforeach
  </div>
  <div class="text-right">
    {{ $news->links() }}
  </div>
</div>
@stop