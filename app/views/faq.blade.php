@extends('layouts.base')

@section('title')
	Batteries Included - FAQ
@stop

@section('content')
    @if(count($faqs) == 0)
      <div class="content-card col-md-10 col-md-offset-1">
        <p>There doesn't seem to be anything here!</p>
        @if(Auth::check())
          Why not <a href="{{ $_ENV['URL'] }}/admin/add/faqs">add a FAQ?</a>
        @endif
      </div>
    @else
        @foreach($faqs as $faq)
            <div class="content-card faq col-md-10 col-md-offset-1">
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
                         <span class="pull-right">
                            <span class="ripple-effect material-flat-button material-flat-edit"><a href="/admin/faqs/{{$faq->id}}/edit">edit</a></span>
                            <span class="ripple-effect material-flat-button material-flat-delete" data-id="{{$faq->id}}" data-name="{{$faq->question}}"><a href="#" class="delete" data-toggle="modal" data-target="#myModal">delete</a></span>
                        </span>
                    @endif
                </div>
            </div>
        @endforeach
    @endif
    </div>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body"></div>
                <div class="modal-footer">

                {{Form::open(array('url' => '', 'class' => 'form-horizontal', 'id' => 'deleteForm', 'role' => 'form', 'method' => 'delete'))}}
                    <span class="ripple-effect material-flat-button material-flat-delete"><a class="confirmDelete">delete</a></span>
                    <span class="ripple-effect material-flat-button material-flat-edit"><a data-dismiss="modal" class="cancelDelete">Cancel</a></span>
                {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@stop