@extends('layouts.admin')

@section('title')
    Batteries Included - Admin Dashboard
@stop

@section('content')

    <div class="content-card col-md-10 col-md-offset-1">
        <h2>Info For <em>{{Auth::user()->username}}</em></h2>

        <p><b>Created at:</b> {{Auth::user()->created_at}}</p>
        <p><b>Last password change:</b> {{Auth::user()->last_password_change}} (passwords are required to be changed every 90 days!)</p>
        <p><b>Next forced password change:</b> {{Auth::user()->last_password_change->addDays(90)}} ({{Carbon::now()->diffInDays(Auth::user()->last_password_change->addDays(90), false)}} Days)</p>


    </div>

@stop