@extends('layouts.base')

@section('title')
	Batteries Included - FAQ
@stop

@section('content')

	<div class="col-md-2">Left</div>
    <div class="col-md-8">
        <div class="faq-question">
            <a class="question" data-toggle="collapse" href="#question1" aria-expanded="false" aria-controls="question">
                <div class="question-heading">
                    <span class="glyphicon glyphicon-question-sign"></span>
                        Do you ship items to customers?
                    <span class="glyphicon glyphicon-menu-down pull-right" aria-hidden="true"></span>
                </div>
            </a>

            <div class="collapse" id="question1">
                <div class="well">
                    No.
                </div>
            </div>
        </div>

        <div class="faq-question">
            <a class="question" data-toggle="collapse" href="#question2" aria-expanded="false" aria-controls="question">
                <div class="question-heading">
                    <span class="glyphicon glyphicon-question-sign"></span>
                        Do you ship items to customers?
                    <span class="glyphicon glyphicon-menu-down pull-right" aria-hidden="true"></span>
                </div>
            </a>

            <div class="collapse" id="question2">
                <div class="well">
                    No.
                </div>
            </div>
        </div>

        <div class="faq-question">
            <a class="question" data-toggle="collapse" href="#question3" aria-expanded="false" aria-controls="question">
                <div class="question-heading">
                    <span class="glyphicon glyphicon-question-sign"></span>
                        Do you ship items to customers?
                    <span class="glyphicon glyphicon-menu-down pull-right" aria-hidden="true"></span>
                </div>
            </a>

            <div class="collapse" id="question3">
                <div class="well">
                    No.
                </div>
            </div>
        </div>

        <div class="faq-question">
            <a class="question" data-toggle="collapse" href="#question4" aria-expanded="false" aria-controls="question">
                <div class="question-heading">
                    <span class="glyphicon glyphicon-question-sign"></span>
                        Do you ship items to customers?
                    <span class="glyphicon glyphicon-menu-down pull-right" aria-hidden="true"></span>
                </div>
            </a>

            <div class="collapse" id="question4">
                <div class="well">
                    No.
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-2">Right</div>

@stop