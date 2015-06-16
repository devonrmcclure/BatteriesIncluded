@extends('layouts.admin')

@section('title')
    Batteries Included - Delete Product
@stop

@section('content')


    <h2>
        Delete FAQ
    </h2>

        <div class="alert alert-danger" role="alert">
          About to delete the following FAQ! Click delete to proceed!
        </div>

        <div class="faq-question">
            <a class="question" data-toggle="collapse" href="#question{{$faq->id}}" aria-expanded="false" aria-controls="question">
                <div class="question-heading">
                    <span class="glyphicon glyphicon-question-sign"></span>
                        {{$faq->question}}
                    <span class="glyphicon glyphicon-menu-down pull-right" aria-hidden="true"></span>
                </div>
            </a>

            <div class="" id="question{{$faq->id}}">
                <div class="well">
                    {{$faq->answer}}
                </div>
            </div>
        </div>



        {{ Form::open(array('url' =>  $_ENV['URL'] . '/admin/delete/faqs/' . $faq->id, 'class' => 'form-horizontal', 'id' => 'productadd-form', 'role' => 'form', 'method' => 'delete')) }}
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-10">
            {{ Form::submit('Delete', array('class' => 'btn btn-default submit-button submit-button', 'id' => 'submit-button', 'name' => 'submit')) }}
          </div>
        </div>

    {{ Form::close() }}


@stop