@extends('layouts.admin')

@section('title')
    Batteries Included - Manage Home
@stop

@section('content')

    <div class="content-card col-md-10 col-md-offset-1">
        <table class="material-table">
          	<tr>
    	        <th>Heading</th>
    	        <th>Content</th>
    	        <th>Created</th>
    	        <th>Manage</th>
          	</tr>
    	    @foreach($contents as $content)
				<tr class="test">
				  	<td>{{$content->heading}}</td>
				  	<td>{{$content->content}}</td>
                    <td>{{$content->created_at->format('F j, Y')}}</td>
				  	<td>
				  		<span class="ripple-effect material-flat-button material-flat-add"><a href="/admin/home/create">add</a></span>
                        <span class="ripple-effect material-flat-button material-flat-edit"><a href="/admin/home/{{$content->id}}/edit">edit</a></span>
                        <span class="ripple-effect material-flat-button material-flat-delete" data-id="{{$content->id}}" data-name="{{$content->heading}}"><a href="#" class="delete" data-toggle="modal" data-target="#deleteConfirm">delete</a></span></span>
						</td>
				</tr>
    	    @endforeach
        </table>
        <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="deleteConfirm">
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