@extends('layouts.admin')

@section('title')
    Batteries Included - View Logs
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
    	        <th>Action</th>
    	        <th>Date</th>
          	</tr>
    	    @foreach($logs as $log)
				<tr class="test">
				  	<td>{{$log->user->username}}</td>
				  	<td>{{$log->action}}</td>
                    <td>{{$log->created_at->format('F j, Y @ H:i')}}</td>
				</tr>
    	    @endforeach
        </table>
    </div>

@stop