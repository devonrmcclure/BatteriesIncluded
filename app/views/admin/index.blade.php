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
      Test
        <h2>Info For <em>{{ $userInfo->username }}</em></h2>

        <p><b>Created at:</b> {{ $userInfo->created_at }}</p>
        <p><b>Last password change:</b> {{ $userInfo->last_password_change }} (passwords are required to be changed every 90 days!)</p>
        <p><b>Next forced password change:</b> {{ date_add($userInfo->last_password_change, date_interval_create_from_date_string('90 days')); }}</p>
    </div>

@stop