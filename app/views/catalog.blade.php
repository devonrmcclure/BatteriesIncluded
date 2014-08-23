@extends('layouts.base')

@section('title')
  Batteries Included - Catalog
@stop

@section('content')

	<div class="col-md-3">
    <h2>
      @if(count($subCategories) == 0 && count($categories) > 1)
        Categories
      @else
        @foreach($categories as $category)
          {{ $category->category_name }}
        @endforeach
      @endif
    </h2>
    <hr />
    <div >
      <ul class="catalog-categories">
      @if(count($categories) > 1)
        @foreach($categories as $category)
          <li><a href="http://batteriesincluded.dev/catalog/{{ $category->category_name }}"> {{ $category->category_name }} </a></li>
        @endforeach
      @elseif(count($categories) == 1)
        @foreach($subCategoryLinks as $subCat)
          <li><a href="http://batteriesincluded.dev/catalog/{{ $subCat->subcategory_name }}"> {{ $subCat->subcategory_name }} </a></li>
        @endforeach
      @elseif(count($categories) == 1 && count($subCategories) == 1)
        @foreach($subCategoryLinks as $subCat)
          <li><a href="http://batteriesincluded.dev/catalog/{{ $subCat->subcategory_name }}"> {{ $subCat->subcategory_name }} </a></li>
        @endforeach
      @endif

      </ul>
    </div>
  </div>

  <div class="col-md-9 content">
    <div class="col-md-12">
      <h2>
        @if(count($categories) == 1 && count($subCategories) != 1)
          @foreach($categories as $category)
            {{ $category->category_name }}
          @endforeach
        @elseif(count($categories) == 1 && count($subCategories) == 1)
          @foreach($subCategories as $subCategory)
            {{ $subCategory->subcategory_name }}
          @endforeach
        @else
          Newest Items
        @endif
      </h2>
      <hr />
    </div>

      @if(count($products) == 0)
        <div class="col-md-12">
          <p>There doesn't seem to be anything here!</p>
        </div>
      @else
        @foreach($products as $product)
          <div class="col-md-4 product-tile">
          @if($product->price != 0.00)
            <span class="pull-right call-for-price">${{ $product->price }}</span>
          @else
            <span class="pull-right call-for-price">Call for price</span>
          @endif
            <img src="http://placehold.it/130x100" class="img-responsive"/>
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