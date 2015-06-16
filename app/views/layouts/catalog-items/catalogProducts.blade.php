@for($i = 0; $i < count($products); $i++)
    @foreach($products[$i] as $product)
        <div class="product-container col-md-3">
        	<div class="product-img">
				<a href="#" data-toggle="modal" data-target="#productModal{{$product->id}}">
	            	<img src="{{$_ENV['URL']}}/img/catalog/{{$product->image}}" class="img-responsive" />
	            </a>
            </div>

            <h4 class="product-name">{{$product->product_name}}</h4>

            <p class="product-description">
            	@if($product->product_description)
	        		{{ Str::limit($product->product_description, 40) }}
	        	@else
	        		There is no description for this product.
	        	@endif
	        </p>

	        <span class="pull-left btn btn-md btn-primary product-modal">
            	<a href="#" data-toggle="modal" data-target="#productModal{{$product->id}}">
            		More Info
            	</a>
          	</span>

        </div>


        <div class="modal fade" id="productModal{{ $product->id }}" role="dialog" aria-labelledby="productModal{{ $product->id }}" aria-hidden="true">
	        <div class="modal-dialog">
	          <div class="modal-content">
	            <div class="modal-header">
	              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	              <h4 class="modal-title" id="myModalLabel">{{$product->product_name}}</h4>
	            </div>
	            <div class="modal-body">
					<img src="{{$_ENV['URL']}}/img/catalog/{{$product->image}}" class="img-responsive center-block" />
	                <small><strong>Brand: </strong>{{$product->brand}}</small><br />
	                <small><strong>Category: </strong>{{$product->category->category_name}}</small><br />
	                <small><strong>Price: </strong>
	                	@if($product->price > 0.00)
	                		{{$product->price}}
	                	@else
	                		Call for price
	                	@endif
	                </small>
					<hr />
	                <p>{{$product->product_description}}</p>
	            </div>
	            <div class="modal-footer">
	              @if(Auth::check())
	                <span class="pull-left btn btn-default btn-primary modal-admin">
	                  <a href="{{$_ENV['URL']}}/admin/edit/product/{{$product->id}}" data-toggle="modal">
	                    <span class="glyphicon glyphicon-edit"></span> Edit
	                  </a>
	                </span>

	                <span class="pull-left btn btn-default btn-danger modal-admin">
	                  <a href="{{$_ENV['URL']}}/admin/delete/product/{{$product->id}}" data-toggle="modal">
	                    <span class="glyphicon glyphicon-trash"></span> Delete
	                  </a>
	                </span>
	              @endif
	              <button type="button" class="btn btn-default btn-primary product-price" data-dismiss="modal">Close</button>
	            </div>
	          </div>
	        </div>
	    </div>
    @endforeach
@endfor