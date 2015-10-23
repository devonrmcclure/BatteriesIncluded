@extends('layouts.admin')

@section('title')
    Batteries Included - Manage Products
@stop

@section('content')

    <div class="content-card col-md-10 col-md-offset-1">
        <table class="material-table">
          	<tr>
    	        <th>Product</th>
    	        <th>Category</th>
    	        <th>Created</th>
    	        <th>Manage</th>
          	</tr>
    	    @foreach($products as $product)
				<tr class="test">
				  	<td>{{$product->product_name}}</td>
				  	<td>{{$product->category->category_name}}</td>
                    <td>{{$product->created_at->format('F j, Y')}}</td>
				  	<td>
                        <span class="ripple-effect material-flat-button material-flat-add"><a href="/admin/products/create">add</a></span>
				  		<span class="ripple-effect material-flat-button material-flat-edit"><a href="/admin/products/{{$product->id}}/edit">edit</a></span>
						<span class="ripple-effect material-flat-button material-flat-delete" data-id="{{$product->id}}" data-name="{{$product->product_name}}"><a href="#" class="delete" data-toggle="modal" data-target="#deleteConfirm">delete</a></span></td>
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