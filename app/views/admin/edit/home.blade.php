@extends('layouts.admin')

@section('title')
    Batteries Included - Edit Home Content
@stop

@section('content')

<div class="content-card col-md-10 col-md-offset-1">
  <h2>
      Edit Home Content
  </h2>


      {{ Form::open(array('url' => '/admin/home/' . $content->id, 'class' => 'form-horizontal', 'id' => 'homeadd-form', 'role' => 'form', 'method' => 'PUT')) }}

      <div class="form-group">
        {{ Form::label('home-heading', 'Heading', array('class' => 'col-sm-3 control-label')) }}

        <div class="col-sm-5">
          {{ Form::text('home-heading', $content->heading, array('class' => 'form-control', 'id' => 'home-heading', 'placeholder' => 'Heading', 'rows' => '3')) }}
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('home-content', 'Content', array('class' => 'col-sm-3 control-label')) }}

        <div class="col-sm-5">
          {{ Form::textarea('home-content', $content->content, array('class' => 'form-control', 'id' => 'home-content', 'placeholder' => 'Content', 'rows' => '5')) }}
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