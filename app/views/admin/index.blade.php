@extends('layouts.admin')

@section('title')
    Batteries Included - Admin Dashboard
@stop

@section('content')

    <div class="col-md-10 content">
        <h2>Info For <em>{{ $userInfo->username }}</em></h2>

        <p><b>Created at:</b> {{ $userInfo->created_at }}</p>
        <p><b>Last password change:</b> {{ $userInfo->last_password_change }} (passwords are required to be changed every 90 days!)</p>
        <p><b>Next forced password change:</b> {{ date_add($userInfo->last_password_change, date_interval_create_from_date_string('90 days')); }}</p>
    </div>

@stop