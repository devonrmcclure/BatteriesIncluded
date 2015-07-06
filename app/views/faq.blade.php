@extends('layouts.base')

@section('title')
	Batteries Included - FAQ
@stop

@section('content')
    @if(count($faqs) == 0)
      <div class="content-card">
        <p>There doesn't seem to be anything here!</p>
        @if(Auth::check())
          Why not <a href="{{ $_ENV['URL'] }}/admin/add/faqs">add a FAQ?</a>
        @endif
      </div>
    @else
        @foreach($faqs as $faq)
            <div class="content-card faq">
                <a class="question" data-toggle="collapse" href="#question{{$faq->id}}" aria-expanded="false" aria-controls="question">
                    <div class="question-heading">
                        <i class="material-icons md-36 indigo500">help</i>
                            {{$faq->question}}
                        <span class="glyphicon glyphicon-menu-down pull-right" aria-hidden="true"></span>
                    </div>
                </a>

                <div class="collapse faq-answer" id="question{{$faq->id}}">
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
        @endforeach
    @endif
    </div>
@stop