@extends('layouts.base')

@section('title')
  Batteries Included - Catalog
@stop

@section('content')

	<div class="col-md-2">
    <h2>Categories</h2>
    <div >
      <ul class="catalog-categories">
        @foreach($categories as $category)
          <li><a href="catalog/{{ $category->category_name }}"> {{ $category->category_name }} </a></li>
        @endforeach
      </ul>
    </div>
  </div>

  <div class="col-md-10 content">
    <div class="col-md-12">
      <h2>Newest Items</h2>
    </div>
      @foreach($products as $product)
        <div class="col-md-3">
        @if($product->price != 0.00)
          <span class="pull-right call-for-price">${{ $product->price }}</span>
        @else
          <span class="pull-right call-for-price">Call for price</span>
        @endif
          <img src="http://placehold.it/100x100" class="img-responsive"/>
          @if($product->subcategory->subcategory_name != 'Uncategorized')
            <small><b>Category:</b> <a href="#"> {{ $product->subcategory->subcategory_name }} </a></small>
          @elseif($product->category->category_name)
            <small><b>Category:</b> <a href="#">{{ $product->category->category_name }}</a></small>
          @endif
          <h4 class="product-name">{{ $product->product_name }}</h4>
          <p>
            {{ $product->product_description }}
          </p>
        </div>
      @endforeach

      @foreach($products as $product)
        <div class="col-md-3">
        @if($product->price != 0.00)
          <span class="pull-right call-for-price">${{ $product->price }}</span>
        @else
          <span class="pull-right call-for-price">Call for price</span>
        @endif
          <img src="http://placehold.it/100x100" class="img-responsive"/>
          @if($product->subcategory->subcategory_name != 'Uncategorized')
            <small><b>Category:</b> <a href="#"> {{ $product->subcategory->subcategory_name }} </a></small>
          @elseif($product->category->category_name)
            <small><b>Category:</b> <a href="#">{{ $product->category->category_name }}</a></small>
          @endif
          <h4 class="product-name">{{ $product->product_name }}</h4>
          <p>
            {{ $product->product_description }}
          </p>
        </div>
      @endforeach

      <!-- Here for tessting purposes because I only have 4 products in the database atm -->
      @foreach($products as $product)
        <div class="col-md-3">
        @if($product->price != 0.00)
          <span class="pull-right call-for-price">${{ $product->price }}</span>
        @else
          <span class="pull-right call-for-price">Call for price</span>
        @endif
          <img src="http://placehold.it/100x100" class="img-responsive"/>
          @if($product->subcategory->subcategory_name != 'Uncategorized')
            <small><b>Category:</b> <a href="#"> {{ $product->subcategory->subcategory_name }} </a></small>
          @elseif($product->category->category_name)
            <small><b>Category:</b> <a href="#">{{ $product->category->category_name }}</a></small>
          @endif
          <h4 class="product-name">{{ $product->product_name }}</h4>
          <p>
            {{ $product->product_description }}
          </p>
        </div>
      @endforeach
  </div>

@stop