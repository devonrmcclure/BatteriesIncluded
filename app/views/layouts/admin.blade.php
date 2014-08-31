@include('layouts.partials.header')
@include('admin.partials.nav')

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
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js') }}
    {{ HTML::script('tb/js/bootstrap.min.js') }}
  @show
  </body>