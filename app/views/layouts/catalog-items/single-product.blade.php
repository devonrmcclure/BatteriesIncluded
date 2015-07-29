<div class="content-card featured col-md-12">
	<h2>{{$product->product_name}}</h2>

	@if(Auth::check())
	<span class="pull-right">
		<span class="ripple-effect material-flat-button material-flat-delete"><a href="#">delete</a></span>
		<span class="ripple-effect material-flat-button material-flat-edit"><a href="#">edit</a></span>
	</span>
	@endif

	<div class="featured-product">
		<img src="/img/catalog/{{$product->image}}" class="img-responsive featured-img" alt="Product Name"/>

		<h3></h3>
		<small class="category"><b>Category:</b> <a href="/catalog/{{$product->category->category_name}}">{{$product->category->category_name}}</a></small><br />
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
</div>