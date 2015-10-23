    @extends('layouts.base')

    @section('title')
        Batteries Included - Services
    @stop

    @section('content')
        @if(count($services) == 0)
          <div class="content-card col-md-10 col-md-offset-1">
            <p>There doesn't seem to be anything here!</p>
            @if(Auth::check())
              Why not <a href="/admin/services/create">add a service?</a>
            @endif
          </div>
        @else
            @foreach($services as $service)
                <div class="content-card faq col-md-10 col-md-offset-1">
                    <a class="question" data-toggle="collapse" href="#question{{$service->id}}" aria-expanded="false" aria-controls="question">
                        <div class="question-heading">
                                {{$service->subject}}
                            <span class="glyphicon glyphicon-menu-down pull-right" aria-hidden="true"></span>
                        </div>
                    </a>

                    <div class="collapse faq-answer" id="question{{$service->id}}">
                        {{$service->info}}

                        @if(Auth::check())
                            <span class="pull-right">
                                <span class="ripple-effect material-flat-button material-flat-edit"><a href="/admin/services/{{$service->id}}/edit">edit</a></span>
                                <span class="ripple-effect material-flat-button material-flat-delete" data-id="{{$service->id}}" data-name="{{$service->subject}}"><a href="#" class="delete" data-toggle="modal" data-target="#deleteModal">delete</a></span>
                            </span>
                        @endif

                    </div>
                </div>
            @endforeach
        @endif
        </div>


        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
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