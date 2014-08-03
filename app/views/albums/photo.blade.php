@extends('layouts.default')
@section('stylesheets')
  {{ HTML::style('css/blueimp-gallery.min.css') }}
  {{ HTML::style('css/bootstrap-image-gallery.css') }}
@stop
@section('content')
  <div class="row top-spacing-big">
    <div class="col-md-10 col-md-offset-1">
      <div class="row top-spacing">
        @if ($paginator->getLastPage() > 1)
          <?php
            $currentPage = $paginator->getCurrentPage();
            $previousPage = $currentPage > 1 ? $currentPage - 1 : 1;
            $isFirstPage = $currentPage == 1;
            $isLastPage = $currentPage == $paginator->getLastPage();
          ?>
          <ul class="pager">
            @if($currentPage != 1)
            <li class="previous">
              <a href="{{ $isFirstPage ? '#' : $paginator->getUrl($previousPage); }}"
                class="item{{ $isFirstPage ? ' disabled' : '' }}">
                <i class="icon left arrow"></i> Previous
              </a>
            </li>
            @endif

            @if($currentPage != $paginator->getLastPage())
            <li class="next">
              <a href="{{ $paginator->getUrl($currentPage+1) }}"
                class="item{{ $currentPage == $paginator->getLastPage() ? ' disabled' : '' }}">
                Next
                <i class="icon right arrow"></i>
              </a>
            </li>
            @endif
          </ul>
        @endif

        @foreach($paginator as $photo)
        <a href="#" class="thumbnail">
          <img src="{{ asset('image/gallery/'.$photo->filename) }}">
        </a>
        @endforeach
        <div class="row text-center">
          <a href="{{ URL::route('gallery.show', $albumId) }}" class="btn btn-warning text-center">
            Back to album
          </a>
        </div>
      </div>

      <div class="row">
        <div id="disqus_thread"></div>
      </div>
    </div>
  </div>
@stop