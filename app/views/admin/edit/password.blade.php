@extends('layouts.admin')

@section('title')
    Batteries Included - Change Password!
@stop

@section('sidebar')

@stop

@section('content')
<div class="col-md-4"></div>
<div class="col-md-5">
<div class="flash-message row">
  @if(Session::has('flash-message'))
      <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close/span></button>
        {{ Session::get('flash-message') }}
      </div>
  @endif
</div>
    <h1>Update Password</h1>
    {{ Form::open(array('url' => $_ENV['URL'] . '/admin/password', 'class' => 'form-horizontal', 'id' => 'login-form', 'role' => 'form', 'method' => 'put')) }}

        <div class="form-group">
          {{ Form::label('pass1', 'Password', array('class' => 'col-sm-2 control-label')) }}

          <div class="col-sm-10">
            {{ Form::password('pass1', array('class' => 'form-control', 'id' => 'pass1', 'placeholder' => 'Password')) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('pass2', 'Confirm Password', array('class' => 'col-sm-2 control-label')) }}

          <div class="col-sm-10">
            {{ Form::password('pass2', array('class' => 'form-control', 'id' => 'pass2', 'placeholder' => 'Confirm Password')) }}
          </div>
        </div>


        {{ Form::submit('Submit', array('class' => 'btn btn-default submit-button submit-button', 'id' => 'submit-button', 'name' => 'submit')) }}

    {{ Form::close() }}
</div>
<div class="col-md-4"></div>

@stop