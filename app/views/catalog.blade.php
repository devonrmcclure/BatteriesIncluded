@extends('layouts.base')

@section('title')
  Batteries Included - Catalog
@stop

@section('content')

	<div class="col-md-3">
    <h2>
      @if(count($categories) > 1 && count($subCategories) == 0)
        Categories
      @else
        @foreach($categories as $category)
          {{ $category->category_name }}
        @endforeach
      @endif
    </h2>
    <hr />
    <div class="col-md-12">
      <ul class="catalog-categories list-group">
      @if(count($categories) > 1 && count($subCategories) == 0)
        @foreach($categories as $category)
          <li class="list-group-item">
            <span class="badge">
              {{ count(Product::wherecategory_id($category->id)->get()); }}
           </span>
            <a href="http://batteriesincluded.dev/catalog/{{ $category->category_name }}">{{ $category->category_name }} </a>
          </li>
        @endforeach
      @else
        @foreach($subCategoryLinks as $subCat)
          <li class="list-group-item">
          <span class="badge">
              {{ count(Product::wheresubcategory_id($subCat->id)->get()); }}
          </span><a href="http://batteriesincluded.dev/catalog/{{ $subCat->subcategory_name }}">{{ $subCat->subcategory_name }}</a></li>
        @endforeach
      @endif

      </ul>
    </div>
  </div>

  <div class="col-md-9 content">
    <div class="col-md-12">
        @if(count($categories) == 1 && count($subCategories) != 1)
          @foreach($categories as $category)
            <h2>All {{ $category->category_name }}</h2>
            <ol class="breadcrumb">
              <li><a href="http://batteriesincluded.dev/catalog">Catalog Home</a></li>
              <li>{{ $category->category_name }}</li>
            </ol>
          @endforeach
        @elseif(count($categories) == 1 && count($subCategories) == 1)
          @foreach($subCategories as $subCategory)
            <h2>{{ $subCategory->subcategory_name }}</h2>
            <ol class="breadcrumb">
              <li><a href="http://batteriesincluded.dev/catalog">Catalog Home</a></li>
              <li>@foreach($categories as $category)<a href="http://batteriesincluded.dev/catalog/{{ $category->category_name }}">{{ $category->category_name }}</a>
                @endforeach
              </li>
              <li>{{ $subCategory->subcategory_name }}</li>
            </ol>
          @endforeach
        @else
          <h2>Newest Items</h2>
        @endif
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
            <span class="pull-right product-price">${{ $product->price }}</span>
          @else
            <span class="pull-right product-price">Call for price</span>
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
  <div class="col-md-3"></div>
  <div class="row content text-center product-pagination">
    <?php
      echo $products->links();
    ?>
  </div>
@stop