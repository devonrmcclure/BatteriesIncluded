@extends('layouts.admin')

@section('title')
    Batteries Included - Add User
@stop

@section('content')

    <div class="content-card col-md-10 col-md-offset-1">
    <h2>
        Add User
    </h2>


        {{ Form::open(array('url' =>  $_ENV['URL'] . '/admin/users', 'class' => 'form-horizontal', 'id' => 'productadd-form', 'role' => 'form', 'files' => true, 'method' => 'POST')) }}

        <div class="form-group">
          {{ Form::label('username', 'Username', array('class' => 'col-sm-3 control-label')) }}

          <div class="col-sm-5">
            {{ Form::text('username', '', array('class' => 'form-control', 'id' => 'role-name', 'placeholder' => 'Username')) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('pass1', 'Password', array('class' => 'col-sm-3 control-label')) }}

          <div class="col-sm-5">
            {{ Form::password('pass1', '', array('class' => 'form-control', 'id' => 'pass1', 'placeholder' => 'Password')) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('pass2', 'Confirm Password', array('class' => 'col-sm-3 control-label')) }}

          <div class="col-sm-5">
            {{ Form::password('pass2', '', array('class' => 'form-control', 'id' => 'pass2', 'placeholder' => 'Confirm Password')) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('role', 'Category', array('class' => 'col-sm-3 control-label')) }}

          <div class="col-sm-5">
            <select class="form-control col-xs-4" id="role" name="role">
                <option value="selectrole">-- Select a Role --</option>
                @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-10">
            {{ Form::submit('Submit', array('class' => '', 'id' => 'submit-button', 'name' => 'submit')) }}
          </div>
        </div>

    {{ Form::close() }}
    </div>
@stop