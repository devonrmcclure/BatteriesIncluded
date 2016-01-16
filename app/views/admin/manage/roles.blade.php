@extends('layouts.admin')

@section('title')
    Batteries Included - Manage Roles
@stop

@section('content')

    <div class="content-card col-md-10 col-md-offset-1">
        <table class="material-table">
          	<tr>
    	        <th>Role</th>
    	        <th>Permissions</th>
    	        <th>Manage</th>
          	</tr>
    	    @foreach($roles as $role)
				<tr class="test">
				  	<td>{{$role->name}}</td>
				  	<td>
                        @foreach($role->permissions as $permission)
                            {{$permission->permission}}
                        @endforeach
                    </td>
				  	<td>
				  		<span class="ripple-effect material-flat-button material-flat-add"><a href="/admin/roles/create">add</a></span>
                        <span class="ripple-effect material-flat-button material-flat-edit"><a href="/admin/roles/{{$role->id}}/edit">edit</a></span>
                        <span class="ripple-effect material-flat-button material-flat-delete" data-id="{{$role->id}}" data-name="{{$role->name}}"><a href="#" class="delete" data-toggle="modal" data-target="#deleteConfirm">delete</a></span></td>
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