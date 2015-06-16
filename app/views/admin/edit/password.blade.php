@extends('layouts.admin')

@section('title')
    Batteries Included - Change Password!
@stop


@section('content')

    <h1>Update Password</h1>
    {{ Form::open(array('url' => $_ENV['URL'] . '/admin/password', 'class' => 'form-horizontal', 'id' => 'login-form', 'role' => 'form', 'method' => 'put')) }}

        <div class="form-group">
          {{ Form::label('currentPass', 'Current Password', array('class' => 'col-sm-4 control-label')) }}

          <div class="col-sm-8">
            {{ Form::password('currentPass', array('class' => 'form-control', 'id' => 'currentPass', 'placeholder' => 'Current Password')) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('pass1', ' New Password', array('class' => 'col-sm-4 control-label')) }}

          <div class="col-sm-8">
            {{ Form::password('pass1', array('class' => 'form-control', 'id' => 'pass1', 'placeholder' => 'New Password')) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('pass2', 'Confirm Password', array('class' => 'col-sm-4 control-label')) }}

          <div class="col-sm-8">
            {{ Form::password('pass2', array('class' => 'form-control', 'id' => 'pass2', 'placeholder' => 'Confirm Password')) }}
          </div>
        </div>


        {{ Form::submit('Submit', array('class' => 'btn btn-default submit-button submit-button', 'id' => 'submit-button', 'name' => 'submit')) }}

    {{ Form::close() }}


@stop