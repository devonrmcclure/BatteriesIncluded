@extends('layouts.admin')

@section('title')
    Batteries Included - Add Service
@stop

@section('content')

<div class="content-card col-md-10 col-md-offset-1">
  <h2>
      Add Service
  </h2>


      {{ Form::open(array('url' => '/admin/services', 'class' => 'form-horizontal', 'id' => 'serviceadd-form', 'role' => 'form', 'method' => 'POST')) }}

      <div class="form-group">
        {{ Form::label('service-question', 'Subject', array('class' => 'col-sm-3 control-label')) }}

        <div class="col-sm-5">
          {{ Form::textarea('service-subject', '', array('class' => 'form-control', 'id' => 'service-subject', 'placeholder' => 'Subject', 'rows' => '3')) }}
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('service-info', 'Info', array('class' => 'col-sm-3 control-label')) }}

        <div class="col-sm-5">
          {{ Form::textarea('service-info', '', array('class' => 'form-control', 'id' => 'service-info', 'placeholder' => 'Info', 'rows' => '5')) }}
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('priority', 'Priority', array('class' => 'col-sm-3 control-label')) }}

        <div class="col-sm-5">
          {{ Form::select('priority', array(
              'select_priority' => '-- Choose a Priority --',
              '0' => 'Low',
              '1' => 'Medium',
              '2' => 'High',
              '3' => 'Very High',
          ), null, array('class' => 'form-control col-xs-4', 'id' => 'priority'))}}
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