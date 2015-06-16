@include('layouts.partials.header')
@include('layouts.partials.nav')

@section('sidebar')
  @include('admin.partials.sidebar')
@show
  <!-- Container -->
  <div class="container">

      <!-- Content -->
      @yield('content')

  </div>

  @section('footer-scripts')
    <!-- Scripts are placed here -->
    {{ HTML::script('bower_components/jquery/dist/jquery.min.js') }}
    {{ HTML::script('bower_components/bootstrap/dist/js/bootstrap.min.js') }}
  @show
  </body>