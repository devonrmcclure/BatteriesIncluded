@extends('layouts.admin')

@section('title')
    Batteries Included - Add Carousel
@stop

@section('content')

<div class="content-card col-md-10 col-md-offset-1">
  <h2>
      Add Carousel Image
  </h2>


      {{ Form::open(array('url' => '/admin/carousels', 'class' => 'form-horizontal', 'id' => 'carouseladd-form', 'role' => 'form', 'files' => true, 'method' => 'POST')) }}

      <div class="form-group">
        {{ Form::label('carousel-title', 'Title', array('class' => 'col-sm-3 control-label')) }}

        <div class="col-sm-5">
          {{ Form::text('carousel-title', '', array('class' => 'form-control', 'id' => 'carousel-title', 'placeholder' => 'Title', 'rows' => '3')) }}
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('carousel-info', 'Info', array('class' => 'col-sm-3 control-label')) }}

        <div class="col-sm-5">
          {{ Form::textarea('carousel-info', '', array('class' => 'form-control', 'id' => 'carousel-info', 'placeholder' => 'Info', 'rows' => '5')) }}
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('image', 'Image', array('class' => 'col-sm-3 control-label')) }}

        <div class="col-sm-5">
          {{ Form::file('image', '', array('class' => 'form-control', 'id' => 'image')) }}
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