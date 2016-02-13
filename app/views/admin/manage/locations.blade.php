@extends('layouts.admin')

@section('title')
    Batteries Included - Manage Products
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
    	        <th>City</th>
    	        <th>Address</th>
    	        <th>Phone</th>
    	        <th>Manage</th>
          	</tr>
    	    @foreach($locations as $location)
				<tr class="test">
				  	<td>{{$location->city}}</td>
				  	<td>{{$location->address}}</td>
                    <td>{{$location->phone}}</td>
				  	<td>
				  		<span class="ripple-effect material-flat-button material-flat-edit"><a href="/admin/locations/{{$location->id}}/edit">edit</a></span>
						</td>
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