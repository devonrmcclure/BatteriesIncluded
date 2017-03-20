@section('title')
    {{$product->product_name}} - Batteries Included
@stop

<div class="content-card featured col-md-12">

	<small class=""><a href="/catalog">Back to Catalog</a></small>

	<h2>{{$product->product_name}}</h2>

	@if(Auth::check())
	<span class="pull-right">
		<span class="ripple-effect material-flat-button material-flat-edit"><a href="/admin/products/{{$product->id}}/edit">edit</a></span>
		<span class="ripple-effect material-flat-button material-flat-delete" data-id="{{$product->id}}" data-name="{{$product->product_name}}"><a href="#" class="delete" data-toggle="modal" data-target="#deleteConfirm">delete</a></span>
	</span>
	@endif

	<div class="featured-product">
		<img src="/img/catalog/{{$product->image}}" class="img-responsive featured-img" alt="Product Name"/>

		<h3></h3>
		<small class="category"><b>Category:</b> <a href="/catalog/{{$product->category->slug}}">{{$product->category->category_name}}</a></small><br />
		<small class="category"><b>Brand:</b> {{$product->brand}}</small>

		<p class="featured-description">
			@if($product->product_description != '')
				{{$product->product_description}}
			@else
				There is no description for this product.
			@endif
		</p>

		<span class="call-for-price pull-right">
			@if($product->price > 0.00)
				{{$product->price}}
			@else
				Call for price
			@endif
		</span>

    </div>

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