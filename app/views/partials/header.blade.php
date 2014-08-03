<div class="nav-container">
  <nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">{{ trans('navbar.brand') }}</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/">{{ trans('navbar.home') }}</a></li>
        <li><a href="{{ URL::route("news.index") }}">{{ trans('navbar.news') }}</a></li>
        <li class="dropdown" style="display:none">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            {{ trans('navbar.committee') }} <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="/committee">{{ trans('navbar.main_committee') }}</a></li>
            <li class="divider"></li>
            <li><a href="/youthcommittee">{{ trans('navbar.youth_committee') }}</a></li>
          </ul>
        </li>
        <li style="display:none"><a href="/activity">{{ trans('navbar.activity') }}</a></li>
        <li><a href="/gallery">{{ trans('navbar.gallery') }}</a></li>
      <!--   <li><a href="/events">{{ trans('navbar.events') }}</a></li> -->
        <li><a href="/committee">{{ trans('navbar.committee') }}</a></li>
        <!-- <li><a href="/exam-result">{{ trans('home_page.submit_result') }}</a></li>
        <li style="display:none"><a href="/links" style="display:none">{{ trans('navbar.links') }}</a></li>
        <li style="display:none"><a href="/about">{{ trans('navbar.about_us') }}</a></li>
 -->        <li><a href="/contact">{{ trans('navbar.contact_us') }}</a></li>
      
      </ul>
    </div>
  </nav>
</div>