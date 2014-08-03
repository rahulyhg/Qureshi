<!DOCTYPE html>
<html>
<head>
  <title>Qureshi Samaj</title>
  <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
  <script type="text/javascript" src="/assets/js/jquery.js"></script>
  <script type="text/javascript" src="/assets/js/bootstrap.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="content">

        <div class="row top-spacing-big">
          <div class="col-md-6 col-md-offset-3">

            <h2 class="text-center">Login</h2>
            @if(Session::has('error'))
              <div class="alert alert-danger">
                {{ Session::get('error') }}
              </div>
            @endif
            {{ Form::model(null, array('route' => 'post_admin_login', 'class' => 'form-horizontal') ) }}
              <div class="form-group">
                {{ Form::label('username','Username', array('class' => 'col-lg-3 control-label') ) }}
                <div class="col-lg-9">
                  {{ Form::text('username', null, array('id' => 'username', 'class' => 'form-control', 'placeholder' => 'Username') ) }}
                </div>
              </div>
              <div class="form-group">
                {{ Form::label('password','Password', array('class' => 'col-lg-3 control-label') ) }}
                <div class="col-lg-9">
                  {{ Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password')) }}
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-offset-3 col-lg-9">
                  <button type="submit" class="btn btn-primary btn-login">Sign in</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      @include('partials.footer')
    </div>
</body>
</html>