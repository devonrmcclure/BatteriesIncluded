@extends('layouts.admin')

@section('title')
    Batteries Included - Manage Products
@stop

@section('content')

    <div class="content-card col-md-10 col-md-offset-1">
        <table class="material-table">
          	<tr>
    	        <th>Question</th>
    	        <th>Answer</th>
    	        <th>Created</th>
    	        <th>Manage</th>
          	</tr>
    	    @foreach($faqs as $faq)
				<tr class="test">
				  	<td>{{$faq->question}}</td>
				  	<td>{{$faq->answer}}</td>
                    <td>{{$faq->created_at->format('F j, Y')}}</td>
				  	<td>
                        <span class="ripple-effect material-flat-button material-flat-add"><a href="/admin/faqs/create">add</a></span>
				  		<span class="ripple-effect material-flat-button material-flat-edit"><a href="/admin/faqs/{{$faq->id}}/edit">edit</a></span>
						<span class="ripple-effect material-flat-button material-flat-delete" data-id="{{$faq->id}}" data-name="{{$faq->question}}"><a href="#" class="delete" data-toggle="modal" data-target="#myModal">delete</a></span></td>
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
            TODO: <br />
            - AJAX search function to search for specific FAQs to manage <br />
    </div>

@stop