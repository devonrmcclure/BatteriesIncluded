@include('layouts.partials.header')
@include('layouts.partials.nav')

@if(Session::has('flash-message'))
    <div class="col-md-3"></div>
    <div class="flash-message col-md-6 text-center">
        <span class="bg-success">{{ Session::get('flash-message') }}</span>
    </div>
    <div class="col-md-3"></div>
@endif

  <!-- Container -->
  <div class="container">

      <!-- Content -->
      @yield('content')

  </div>