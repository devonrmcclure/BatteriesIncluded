@extends('layouts.base')

@section('title')
  Batteries Included - Catalog
@stop

@section('content')

	<div class="col-md-2">
    <h2>Categories</h2> <hr />
    <div >
      <ul class="catalog-categories">
        @foreach($categoryLinks as $category)
          <li><a href="http://batteriesincluded.dev/catalog/{{ $category->category_name }}"> {{ $category->category_name }} </a></li>
        @endforeach
      </ul>
    </div>
  </div>

  <div class="col-md-10 content">
  <div class="col-md-12">
    <h2>
      @if(count($categories) == 1)
        @foreach($categories as $category)
          {{ $category->category_name }}
          <hr />
        @endforeach
      @elseif(count($categories) == 0)
        @foreach($subCategories as $subCategory)
          {{ $subCategory->subcategory_name }}
          <hr />
        @endforeach
      @else
        Newest Items
        <hr />
      @endif
    </h2>
  </div>
      @if(count($products) == 0)
        <div class="col-md-12">
          <p>There doesn't seem to be anything here!</p>
        </div>
      @else
        @foreach($products as $product)
          <div class="col-md-3 product-tile">
          @if($product->price != 0.00)
            <span class="pull-right call-for-price">${{ $product->price }}</span>
          @else
            <span class="pull-right call-for-price">Call for price</span>
          @endif
            <img src="http://placehold.it/100x100" class="img-responsive"/>
            @if($product->subcategory->subcategory_name != 'Uncategorized')
              <small><b>Category:</b> <a href="http://batteriesincluded.dev/catalog/{{ $product->subcategory->subcategory_name }}"> {{ $product->subcategory->subcategory_name }} </a></small>
            @elseif($product->category->category_name)
              <small><b>Category:</b> <a href="http://batteriesincluded.dev/catalog/{{ $product->category->category_name }}">{{ $product->category->category_name }}</a></small>
            @endif
            <h4 class="product-name">{{ $product->product_name }}</h4>
            <p>
              {{ $product->product_description }}
            </p>
          </div>
        @endforeach
      @endif

  </div>

  <div class="row content text-center product-pagination">
    <?php
      echo $products->links();
    ?>
  </div>
@stop