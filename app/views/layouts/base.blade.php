<!DOCTYPE html>
<html>
	<head>
	    <title>
	        @section('title')
	        	Batteries Included - They Make It First, We Make It Last!
	        @show
	    </title>
	    <meta charset="utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	    <!-- CSS are placed here -->
	    @section('head')
		    <link rel="stylesheet" href="{{URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
		    <link href='http://fonts.googleapis.com/css?family=Roboto:500,400italic,700italic,300,700,500italic,300italic,400' rel='stylesheet' type='text/css'>
		    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
		          rel="stylesheet">
		    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
	    @show


	</head>
<body>

	@include('layouts.partials.nav')

	@section('sidebar')
		@include('layouts.partials.sidebar')
	@show

	<!-- Content -->
	<div class="content col-md-10 col-md-offset-2">
		@yield('content')
	</div>
	<!-- End Content -->


	<!-- Floating Action Button -->
	@if(Auth::check())
	<ul class="fab z-index-25">
		<a href="#" class="fab-toggle"><li class="fab-main ripple-effect"><i class="material-icons md-24 md-white">add</i></li></a>

		<li class="fab-item ripple-effect fab-deep-purple hidden"><a href="/admin/add/product"><i class="material-icons md-24 md-white">shopping_cart</i></a></li>

		<li class="fab-item ripple-effect fab-light-blue hidden"><a href="/admin/add/faq"><i class="material-icons md-24 md-white">help</i></a></li>

	</ul>
	@endif
	<!-- End Floating Action Button -->

	<!-- Toast Style Notification Popup -->
	@if(Session::has('flash-message'))
	<div class="toast z-index-35">
		<i class="material-icons md-24 md-{{Session::get('alert-class', 'info')}}">
			@if(Session::get('alert-class') == 'success')
				check
			@elseif(Session::get('alert-class')  == 'error')
				clear
			@else
				announcement
			@endif
		</i><div class="toast-message"><span>{{Session::get('flash-message')}}</span></div>
	</div>
	@endif
	<!-- End Toast -->

	<!-- Footer -->
	@section('footer')
		@include('layouts.partials.footer')
	@show
	<!-- End Footer -->

	@section('scripts')
		<!-- Scripts are placed here -->
		{{HTML::script('bower_components/jquery/dist/jquery.min.js')}}
		{{HTML::script('bower_components/bootstrap/dist/js/bootstrap.min.js')}}
		{{HTML::script('js/app.js')}}
		<!-- End Scripts -->
	@show
</body>
</html>