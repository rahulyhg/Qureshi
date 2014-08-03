@extends ("layouts.default")

@section('content')
<div id="carousel-example-generic" class="carousel slide index-carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">
    <!-- <div class="item active">
      <img src="http://placehold.it/1170x500&text=Image">
    </div>
    <div class="item">
      <img src="http://placehold.it/1170x500&text=Image">
    </div>
    <div class="item">
      <img src="http://placehold.it/1170x500&text=Image">
    </div> -->

    <div class="item active">
      <img src="assets/img/img1.bmp" height="500" width="1170">
    </div>
    <div class="item">
      <img src="assets/img/img2.bmp" height="500" width="1170">
    </div>
    <div class="item">
      <img src="assets/img/img3.bmp" height="500" width="1170">
    </div>
  </div>

  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="icon-prev"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="icon-next"></span>
  </a>
</div>


<div class="row top-spacing">
  <div class="col-md-8">
    <div class="panel panel-default panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">{{ trans('home_page.recent_news') }}</h3>
      </div>
      <div class="panel-body">
        @if(! count($news) )
        <p class="text-center">{{ trans('home_page.no_recent_news') }}</p>
        @else
        <ul>
          @foreach($news as $currentNews)
            <li>
              <a href="{{ URL::route('news.show', $currentNews->id) }}">
                <h4>
                  @if(App::getLocale() == "en")
                  {{ $currentNews->title }}
                  @else
                  {{ $currentNews->guj_title }}
                  @endif
                </h4>
              </a>
            </li>
          @endforeach
        </ul>
        @endif
      </div>
    </div>
  </div>
  <div class="col-md-4">
    @if( $nextEvent )
    <div class="panel panel-default panel-info">
      <div class="panel-heading">{{ trans('home_page.next_events') }}</div>
      <div class="panel-body text-center">
        <h3>
          <span class="label label-primary">
            {{  date( 'd-m-Y', strtotime( $nextEvent->date ) ) }}
          </span>
        </h3>
        <p>
          @if(App::getLocale() == "en")
            {{ $nextEvent->name }}
          @else
            {{ $nextEvent->guj_name }}
          @endif
        </p>
        <p>
          @if(App::getLocale() == "en")
            {{ $nextEvent->address or "" }}
          @else
            {{ $nextEvent->guj_address or "" }}
          @endif
        </p>
      </div>
    </div>
    @endif

    <div class="panel panel-default panel-info">
      <div class="panel-heading">{{ trans('home_page.another_links') }}</div>
      <div class="panel-body">
        <ul>
          <li>
            <a href="/exam-result">{{ trans('home_page.submit_result') }}</a>
          </li>
        </ul>
        @if($otherDocsLink)
        <ul>
          @foreach ($otherDocsLink as $doc)
          <li>
            <a href="{{ asset('files/'.$doc->filename) }}">
              @if(App::getLocale() == "en")
              {{ $doc->name }}
              @else
              {{ $doc->guj_name }}
              @endif
            </a>
          </li>
          @endforeach
        </ul>
        @endif
      </div>
    </div>
  </div>
</div>
@stop