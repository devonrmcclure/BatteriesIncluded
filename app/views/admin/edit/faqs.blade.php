@extends('layouts.admin')

@section('title')
    Batteries Included - Edit Categories Index
@stop

@section('content')

    <h2>
        Edit FAQ
    </h2>
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


@stop