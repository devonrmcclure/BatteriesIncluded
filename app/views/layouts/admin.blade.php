@include('layouts.partials.header')
@include('layouts.partials.nav')

@section('sidebar')
  @include('admin.partials.sidebar')
@show


  <!-- Container -->
  <div class="container">
    <div class="col-md-8 content">
      <div class="flash-message">
        @if(Session::has('flash-message'))
            <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              {{Session::get('flash-message')}}
            </div>
        @endif
      </div>
        <!-- Content -->
        @yield('content')

    </div>
  </div>
  @section('footer-scripts')
    <!-- Scripts are placed here -->
    {{ HTML::script('bower_components/jquery/dist/jquery.min.js') }}
    {{ HTML::script('bower_components/bootstrap/dist/js/bootstrap.min.js') }}
  @show
  </body>