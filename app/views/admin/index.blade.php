@extends('layouts.admin')

@section('title')
    Batteries Included - Admin Dashboard
@stop

@section('content')

    <div class="content-card">
        <h2>Info For <em>{{Auth::user()->username}}</em></h2>

        <p><b>Created at:</b> {{Auth::user()->created_at}}</p>
        <p><b>Last password change:</b> {{Auth::user()->last_password_change}} (passwords are required to be changed every 90 days!)</p>
        <p><b>Next forced password change:</b> {{date_add(Auth::user()->last_password_change, date_interval_create_from_date_string('90 days'))}}</p>
    </div>

@stop