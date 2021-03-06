@extends('layouts.admin')

@section('title')
    Batteries Included - Manage Services
@stop

@section('content')

    <div class="content-card col-md-10 col-md-offset-1">
        <div class="group">
            {{Form::text('rt-search', '', array('type' => 'text', 'name' => 'rt-search', 'class' => 'search', 'id' => 'rt-search', 'required'))}}
            <span class="highlight"></span>
            <span class="bar"></span>
            {{Form::label('search', 'Filter')}}
        </div>
    </div>

    <div class="content-card col-md-10 col-md-offset-1">
        <table class="material-table">
          	<tr>
    	        <th>Subject</th>
    	        <th>Info</th>
    	        <th>Created</th>
    	        <th>Manage</th>
          	</tr>
    	    @foreach($services as $service)
				<tr class="test">
				  	<td>{{$service->subject}}</td>
				  	<td>{{$service->info}}</td>
                    <td>{{$service->created_at->format('F j, Y')}}</td>
				  	<td>
                        <span class="ripple-effect material-flat-button material-flat-add"><a href="/admin/services/create">add</a></span>
				  		<span class="ripple-effect material-flat-button material-flat-edit"><a href="/admin/services/{{$service->id}}/edit">edit</a></span>
						<span class="ripple-effect material-flat-button material-flat-delete" data-id="{{$service->id}}" data-name="{{$service->subject}}"><a href="#" class="delete" data-toggle="modal" data-target="#myModal">delete</a></span></td>
				</tr>
    	    @endforeach
        </table>
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
    </div>

@stop