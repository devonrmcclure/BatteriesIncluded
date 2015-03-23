@extends('layouts.admin')

@section('title')
    Batteries Included - Admin Dashboard
@stop

@section('content')

    <div class="col-md-10 content">
    <div class="flash-message row">
      @if(Session::has('flash-message'))
          <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close/span></button>
            {{ Session::get('flash-message') }}
          </div>
      @endif
    </div>
        <h2>WHAT DO HERE</h2>
    </div>

@stop