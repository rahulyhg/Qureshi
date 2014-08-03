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
    	@include("partials.header")
		<div class="content">
			@yield('content')
		</div>
		@include('partials.footer')
    </div>
    @yield('scripts')
</body>
</html>