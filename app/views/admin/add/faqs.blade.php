@extends('layouts.admin')

@section('title')
    Batteries Included - Add Catalog Item
@stop

@section('content')

<div class="content-card">
  <h2>
      Add FAQ
  </h2>


      {{ Form::open(array('url' => '/admin/add/faq', 'class' => 'form-horizontal', 'id' => 'faqadd-form', 'role' => 'form', 'method' => 'POST')) }}

      <div class="form-group">
        {{ Form::label('faq-question', 'Question', array('class' => 'col-sm-3 control-label')) }}

        <div class="col-sm-5">
          {{ Form::textarea('faq-question', '', array('class' => 'form-control', 'id' => 'faq-question', 'placeholder' => 'Question', 'rows' => '3')) }}
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('faq-answer', 'Answer', array('class' => 'col-sm-3 control-label')) }}

        <div class="col-sm-5">
          {{ Form::textarea('faq-answer', '', array('class' => 'form-control', 'id' => 'faq-answer', 'placeholder' => 'Answer', 'rows' => '5')) }}
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