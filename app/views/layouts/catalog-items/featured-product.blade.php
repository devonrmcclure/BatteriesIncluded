<div class="content-card featured col-md-12">
	<h2>Featured Product</h2>

	@if(Auth::check())
	<span class="pull-right">
		<span class="ripple-effect material-flat-button material-flat-delete"><a href="#">DELETE</a></span>
		<span class="ripple-effect material-flat-button material-flat-edit"><a href="#">edit</a></span>
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
</div>