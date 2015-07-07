@extends('layouts.base')

@section('title')
  Batteries Included - Catalog
@stop


@section('content')

	    <div class="content-card featured col-md-12">
	    	<h2>Featured Product</h2>

			@if(Auth::check())
			<span class="pull-right">
				<span class="material-flat-button material-flat-delete"><a href="#">DELETE</a></span>
				<span class="material-flat-button material-flat-edit"><a href="#">edit</a></span>
			</span>
			@endif

	    	<div class="featured-product">
	    		<img src="/img/catalog/{{$featured->image}}" class="img-responsive featured-img" alt="Product Name"/>

				<h3>{{$featured->product_name}}</h3>
				<small class="category"><b>Category:</b> <a href="/catalog/{{$featured->category->category_name}}">{{$featured->category->category_name}}</a></small>

				<p class="featured-description">
					{{$featured->product_description}}
				</p>

				<span class="call-for-price">
					@if($featured->price > 0.00)
						{{$featured->price}}
					@else
						Call for price
					@endif
				</span>

	        </div>
	    </div>

	<div class="content-card catalog-menu col-md-3">
		<h2>Categories</h2>
		<ul class="catalog-categories">
			{{$menu}}
		</ul>
	</div>


	<div class="col-md-9 pull-right">
		<div class="content-card col-md-12">
			<h2 class="newest-products">Newest Products</h2>
		</div>

		@for($i = 0; $i < count($products); $i++)
		    @foreach($products[$i] as $product)
		    	<div class="content-card product-tile col-md-3">
		    		<img src="/img/catalog/{{$product->image}}" class="img-responsive product-img" alt="{{$product->product_name}}"/>

					<h4 class="product-name">{{$product->product_name}}</h4>

					<p class="product-description">
						@if($product->product_description)
							{{ Str::limit($product->product_description, 40) }}
						@else
							There is no description for this product.
						@endif
					</p>

					<p class="material-flat-button material-flat-product"><a href="/catalog/product/{{$product->id}}">More Info</a></p>
			    </div>
			@endforeach
		@endfor



	</div>
@stop