@extends('layouts.base')

@section('title')
  Batteries Included - Catalog
@stop


@section('content')
	<div class="col-md-10 col-md-offset-1">
		@if(isset($featured))
			@include('layouts.catalog-items.featured-product')
	    @endif

		@if(isset($category))
			@include('layouts.catalog-items.category-products')
		@elseif(isset($singleProduct))
			@include('layouts.catalog-items.single-product')
		@else
			@include('layouts.catalog-items.index')
		@endif
	</div>
@stop