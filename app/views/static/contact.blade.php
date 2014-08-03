@extends('layouts.default')

@section('content')
<div class="container top-spacing">
  <div class="row">
    <div class="col-md-6">
      <h3>{{ trans('general.contact_us') }}:</h3>
      <p>
        <strong>{{trans('general.email')}}: </strong>
        <a href="mailto:rizwanqureshi15@gmail.com">
          rizwanqureshi15@gmail.com
        </a>
      </p>
      <br>
      <h4>{{ trans('navbar.committee') }}:</h4>
      <p>
        @if(App::getLocale() == "en")
        Rizwan Qureshi - 99795 57690
        <br>
        Rizwan Qureshi - 99795 57690
        @else
        રિઝવાન કુરેશી - 99795 57690
        <br>
        રિઝવાન કુરેશી - 99795 57690
        @endif
      </p>
    </div>
    <div class="col-md-6">
      <h3>Address:</h3>
      <p>Plot Number:509,</p>
      <p>Ward No:6,</p>
      <p>Bhuj-Kutch,</p>
      <p>Gujarat-370001</p>
  </div>
</div>
@stop

@section('scripts')
<script src="/js/jquery.form.js"></script>
@stop