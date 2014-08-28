@extends('layouts.admin')

@section('title')
    Batteries Included - Home
@stop

@section('sidebar')

@stop

@section('content')

@if(Session::has('flash-message'))
  <div class="row content">
    <div class="col-md-3"></div>
    <div class="flash-message col-md-6 text-center">
        <span class="{{ Session::get('alert-class', 'alert-info') }}">
            {{ Session::get('flash-message') }}
        </span>
    </div>
    <div class="col-md-3"></div>
  </div>
@endif
    <div class="col-md-4"></div>
    <div class="col-md-5">
        <h1>Please login!</h1>
        <hr />
        {{ Form::open(array('url' => 'http://batteriesincluded.dev/admin/login', 'class' => 'form-horizontal', 'id' => 'login-form', 'role' => 'form')) }}

            <div class="form-group">
              {{ Form::label('username', 'Userame', array('class' => 'col-sm-2 control-label')) }}

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
    <div class="col-md-4"></div>

@stop