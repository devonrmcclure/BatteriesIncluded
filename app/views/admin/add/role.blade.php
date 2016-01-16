@extends('layouts.admin')

@section('title')
    Batteries Included - Add Role
@stop

@section('content')

    <div class="content-card col-md-10 col-md-offset-1">
    <h2>
        Add Role
    </h2>


        {{ Form::open(array('url' =>  $_ENV['URL'] . '/admin/roles', 'class' => 'form-horizontal', 'id' => 'productadd-form', 'role' => 'form', 'files' => true, 'method' => 'POST')) }}

        <div class="form-group">
          {{ Form::label('role-name', 'Role', array('class' => 'col-sm-3 control-label')) }}

          <div class="col-sm-5">
            {{ Form::text('role-name', '', array('class' => 'form-control', 'id' => 'role-name', 'placeholder' => 'Role Name')) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('permission_name', 'Permissions', array('class' => 'col-sm-3 control-label')) }}

          <div class="col-sm-5">
            @foreach($permissions as $permission)
              <div class="col-sm-6">
              {{ Form::label($permission->permission, $permission->permission, array('class' => 'control-label')) }}
              {{ Form::checkbox('permissions[]', $permission->permission, '', array('id' => $permission->permission)) }}
              </div>
            @endforeach
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