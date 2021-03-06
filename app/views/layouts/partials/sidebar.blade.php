 <!-- Sidebar -->
<div class="sidebar z-index-30">
	<div class="nav">
		<a href="{{$_ENV['URL']}}" class="sidebar-toggle"><i class="material-icons">menu</i></a>
		<div class="brand-header">
			<a class="brand-name" href="{{$_ENV['URL']}}">Batteries Included</a>
		</div>
	</div>

	<!-- If logged in, show Admin drop down here -->
	@if(Auth::check())
	<div class="sidebar-header">
		<span class="user-image"><a href="/admin"><i class="material-icons md-48">account_circle</i></a></span>
		<div class="user-info dropdown">
			<a href="#" id="user-dropdown" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="username">{{Auth::user()->username}} <i class="caret"></i></span></a>
			<ul class="dropdown-menu pull-right" aria-labelledby="user-dropdown">
				<li class="ripple-effect"><a href="{{$_ENV['URL']}}/admin"><i class="material-icons md-24 indigo500">home</i>Admin Dashboard</a></li>
				<li role="separator" class="divider"></li>
				<li class="ripple-effect"><a href="{{$_ENV['URL']}}/admin/logout"><i class="material-icons md-24 redA700">power_settings_new</i>Log out</a></li>
			</ul>
			<br />
			<small>Access Admin options</small>
		</div>
	</div>
	@endif
	<!-- End Admin Section -->

	<!-- Sidebar Search -->
	@section('sidebar-search')
	    {{ Form::open(array('url' => $_ENV['URL'] . '/search', 'class' => 'sidebar-search', 'id' => 'search-form', 'role' => 'form', 'method' => 'GET')) }}
			<div class="group">
				{{Form::text('search', '', array('class' => 'search', 'id' => 'search', 'required'))}}
				<span class="highlight"></span>
				<span class="bar"></span>
				{{Form::label('search', 'Search')}}
			</div>
		{{Form::close()}}
	@show
   	<!-- End Sidebar Search -->

	<!-- Sidebar Navigation -->
	<div class="sidebar-nav">
		<ul>
			<!-- Define Sidebar-nav Links -->
			@section('sidebar-nav-links')
				<li class="ripple-effect"><a href="/"><i class="material-icons md-24 indigo500">home</i> Home</a></li>
				<li class="ripple-effect"><a href="/catalog"><i class="material-icons md-24 green500">shopping_cart</i> Catalog</a></li>
				<li class="ripple-effect"><a href="/services"><i class="material-icons md-24 grey700">build</i> Services</a></li>
				<li class="ripple-effect"><a href="/faq"><i class="material-icons md-24 deep-purple500">help</i> FAQ</a></li>
				<li class="ripple-effect"><a href="/locations"><i class="material-icons md-24 redA700">location_on</i> Locations</a></li>
			@show
			<!-- End Sidebar-nav links -->
		</ul>
	</div>
</div>