@extends('layouts.base')

@section('title')
  Batteries Included - Catalog
@stop

@section('content')

	<div class="col-md-2 ">
    <h2>Categories</h2>
    <div >
      <ul class="catalog-categories">
        <li><a href="catalog/batteries">Batteries</a></li>
        <li><a href="#">Batteries</a></li>
        <li><a href="#">Batteries</a></li>
        <li><a href="#">Batteries</a></li>
        <li><a href="#">Batteries</a></li>
        <li><a href="#">Batteries</a></li>
      </ul>
    </div>
  </div>

  <div class="col-md-10 content">
    <div class="col-md-12">
      <h2>Newest Items</h2>
    </div>
    <div class="row content">
      @foreach($products as $product)
        <div class="col-md-3">
        @if($product->price != 0.00)
          <span class="pull-right call-for-price">${{ $product->price }}</span>
        @else
          <span class="pull-right call-for-price">Call for price</span>
        @endif
          <img src="http://placehold.it/100x100" class="img-responsive"/>
          @if($product->subcategory->subcategory_name != 'Uncategorized')
            <small>Category: {{ $product->subcategory->subcategory_name }} </small>
          @elseif($product->category->category_name)
            <small>Category: {{ $product->category->category_name }} </small>
          @endif
          <h4 class="product-name">{{ $product->product_name }}</h4>
          <p>
            {{ $product->product_description }}
          </p>

        </div>
      @endforeach
    </div>
  </div>

@stop