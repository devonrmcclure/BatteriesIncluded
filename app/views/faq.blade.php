@extends('layouts.base')

@section('title')
	Batteries Included - FAQ
@stop

@section('content')

    <div class="col-md-8">
        @if(count($faqs) == 0)
          <div class="col-md-12">
            <p>There doesn't seem to be anything here!</p>
            @if(Auth::check())
              Why not <a href="{{ $_ENV['URL'] }}/admin/add/faqs">add a FAQ?</a>
            @endif
          </div>
        @else
            @foreach($faqs as $faq)
                <div class="faq-question">
                    <a class="question" data-toggle="collapse" href="#question{{$faq->id}}" aria-expanded="false" aria-controls="question">
                        <div class="question-heading">
                            <span class="glyphicon glyphicon-question-sign"></span>
                                {{$faq->question}}
                            <span class="glyphicon glyphicon-menu-down pull-right" aria-hidden="true"></span>
                        </div>
                    </a>

                    <div class="collapse" id="question{{$faq->id}}">
                        <div class="well">
                            {{$faq->answer}}

                            @if(Auth::check())
                                <span class="pull-right btn btn-default btn-primary modal-admin">
                                    <a href="{{ $_ENV['URL'] }}/admin/edit/faqs/{{$faq->id}}" data-toggle="modal">
                                        <span class="glyphicon glyphicon-edit"></span> Edit
                                    </a>
                                </span>
                                <span class="pull-right btn btn-default btn-danger modal-admin">
                                    <a href="{{ $_ENV['URL'] }}/admin/delete/faqs/{{$faq->id}}" data-toggle="modal">
                                        <span class="glyphicon glyphicon-trash"></span> Delete
                                    </a>
                                </span>
                                <br/>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>

@stop