@extends('layouts.admin')

@section('title')
    Batteries Included - Manage Users
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
    	        <th>User</th>
    	        <th>Role</th>
                @if(Auth::user()->role->name == 'Admin')
                    <th>View Logs</th>
                @endif
    	        <th>Manage</th>
          	</tr>
    	    @foreach($users as $user)
				<tr class="test">
				  	<td>{{$user->username}}</td>
				  	<td>{{$user->role->name}}</td>
                    @if(Auth::user()->role->name == 'Admin')
                        <td><a href="/admin/logs/{{$user->id}}">{{$user->username}} logs</a></td>
                    @endif
				  	<td>
				  		<span class="ripple-effect material-flat-button material-flat-add"><a href="/admin/users/create">add</a></span>
                        <span class="ripple-effect material-flat-button material-flat-edit"><a href="/admin/users/{{$user->id}}/edit">edit</a></span>
                        <span class="ripple-effect material-flat-button material-flat-delete" data-id="{{$user->id}}" data-name="{{$user->username}}"><a href="#" class="delete" data-toggle="modal" data-target="#deleteConfirm">delete</a></span></td>
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