@extends('layouts.base')

@section('title')
    Batteries Included - Login
@stop

@section('sidebar')

@stop

@section('content')

<div class="content-card col-md-4 col-md-offset-4">
    <h1 class="form-header">Please login!</h1>

    {{ Form::open(array('url' => $_ENV['URL'] . '/admin/login', 'class' => '', 'id' => 'login-form', 'role' => 'form', 'method' => 'POST')) }}
    <div class="group">
      {{ Form::text('username', '', array('class' => '', 'id' => 'username', 'required')) }}
      <span class="highlight"></span>
      <span class="bar"></span>
      {{ Form::label('username', 'Username') }}
    </div>



    <div class="group">
      {{ Form::password('password', '', array('class' => '', 'id' => 'password', 'required')) }}
      <span class="highlight"></span>
      <span class="bar"></span>
      {{ Form::label('password', 'Password') }}
    </div>

    {{ Form::submit('Submit', array('class' => '', 'id' => 'submit-button', 'name' => 'submit')) }}

    {{ Form::close() }}
</div>

@stop