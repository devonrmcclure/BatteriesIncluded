<div class="content-card featured col-md-12">
	<h2>Featured Product</h2>

	@if(Auth::check())
	<span class="pull-right">
		<span class="ripple-effect material-flat-button material-flat-edit"><a href="/admin/products/{{$featured->id}}/edit">edit</a></span>
		<span class="ripple-effect material-flat-button material-flat-delete" data-id="{{$featured->id}}" data-name="{{$featured->product_name}}"><a href="#" class="delete" data-toggle="modal" data-target="#deleteConfirm">delete</a></span>
	</span>
	@endif

	<div class="featured-product">
		<img src="/img/catalog/{{$featured->image}}" class="img-responsive featured-img" alt="Product Name"/>

		<h3>{{$featured->product_name}}</h3>
		<small class="category"><b>Category:</b> <a href="/catalog/{{$featured->category->category_name}}">{{$featured->category->category_name}}</a></small><br/>
		<small class="category"><b>Brand:</b> {{$featured->brand}}</small>

		<p class="featured-description">
			@if($featured->product_description != '')
				{{$featured->product_description}}
			@else
				There is no description for this product.
			@endif
		</p>

		<span class="call-for-price pull-right">
			@if($featured->price > 0.00)
				{{$featured->price}}
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