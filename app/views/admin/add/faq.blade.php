@extends('layouts.admin')

@section('title')
    Batteries Included - Add Catalog Item
@stop

@section('content')

<div class="col-md-8 content">
    <div class="flash-message row">
      @if(Session::has('flash-message'))
          <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            {{ Session::get('flash-message') }}
          </div>
      @endif
    </div>

<h2>
    Add FAQ
</h2>


    {{ Form::open(array('url' => $_ENV['URL'] . '/admin/add/faq', 'class' => 'form-horizontal', 'id' => 'faqadd-form', 'role' => 'form')) }}

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
        {{ Form::submit('Submit', array('class' => 'btn btn-default submit-button submit-button', 'id' => 'submit-button', 'name' => 'submit')) }}
      </div>
    </div>

{{ Form::close() }}

</div>
@stop