<div class="content-card col-md-12">
	@if(isset($category))
		<h2 class="product-heading">{{$category}}</h2>
	@else
		<h2 class="product-heading">Newest Products</h2>
	@endif

	@if(isset($breadcrumbs))
        <ol class="breadcrumb">
            @if(isset($category))
                <li><a href="/catalog">Catalog Home</a></li>
                @for($i = count($breadcrumbs)-1; $i >= 0; $i--)
                    {{ $breadcrumbs[$i] }}
                @endfor
            @endif
        </ol>
    @endif
</div>

@include('layouts.catalog-items.menu')


@foreach($products as $product)
	<div class="content-card product-tile col-md-2">
		<img src="/img/catalog/{{$product->image}}" class="img-responsive product-img" alt="{{$product->product_name}}"/>

		<h4 class="product-name">{{Str::limit($product->product_name, 35)}}</h4>

		<p class="product-description">
			@if($product->product_description != '')
				{{Str::limit($product->product_description, 40)}}
			@else
				There is no description for this product.
			@endif
		</p>

		<p class="material-flat-button material-flat-product ripple-effect"><a href="/catalog/product/{{$product->id}}">More Info</a></p>
    </div>
@endforeach