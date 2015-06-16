@extends('layouts.admin')

@section('title')
    Batteries Included - Login
@stop

@section('sidebar')

@stop

@section('content')
<div class="col-md-3"></div>
<div class="col-md-6">
    <h1>Please login!</h1>
    {{ Form::open(array('url' => $_ENV['URL'] . '/admin/login', 'class' => 'form-horizontal', 'id' => 'login-form', 'role' => 'form')) }}

        <div class="form-group">
          {{ Form::label('username', 'Username', array('class' => 'col-sm-2 control-label')) }}

          <div class="col-sm-10">
            {{ Form::text('username', '', array('class' => 'form-control', 'id' => 'username', 'placeholder' => 'Username')) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('password', 'Password', array('class' => 'col-sm-2 control-label')) }}

          <div class="col-sm-10">
            {{ Form::password('password', array('class' => 'form-control', 'id' => 'password', 'placeholder' => 'Password')) }}
          </div>
        </div>


        {{ Form::submit('Submit', array('class' => 'btn btn-default submit-button submit-button', 'id' => 'submit-button', 'name' => 'submit')) }}

    {{ Form::close() }}
</div>
<div class="col-md-3"></div>

@stop