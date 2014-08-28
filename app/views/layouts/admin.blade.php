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