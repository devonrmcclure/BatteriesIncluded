@extends('layouts.admin')

@section('title')
    Batteries Included - Manage Products
@stop

@section('content')

    <div class="content-card col-md-10 col-md-offset-1">
        <span class="ripple-effect material-flat-button material-flat-add"><a href="/admin/products/add">add product</a></span>
        <table class="material-table">
          	<tr>
    	        <th>Product</th>
    	        <th>Category</th>
    	        <th>Created</th>
    	        <th>Manage</th>
          	</tr>
        	@for($i = 0; $i < count($products); $i++)
        	    @foreach($products[$i] as $product)
    				<tr>
    				  	<td>{{$product->product_name}}</td>
    				  	<td>{{$product->category->category_name}}</td>
    				  	<td>{{date('F j, Y',strtotime($product->created_at))}}</td>
    				  	<td>
    				  		<span class="ripple-effect material-flat-button material-flat-edit"><a href="/admin/products/edit/{{$product->id}}">edit</a></span>
    						<span class="ripple-effect material-flat-button material-flat-delete"><a href="#">delete</a></span></td>
    				</tr>
        	    @endforeach
        	@endfor
        </table>

            TODO: <br />
            - List products <br />
            - Allow editing/delete of products inline (LATER TOTO: AJAX search function to search for specific products to manage) <br />
            - Popup modal to add a product (alternatively, a form pops up on the page to add)
    </div>

@stop