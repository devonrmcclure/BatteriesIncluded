@extends('layouts.base')

@section('title')
  Batteries Included - Search Results
@stop

@section('content')
    <div class="col-md-3">
    <h2>
      Categories
    </h2>
    <!-- Search -->
    <div class="search-products">
      {{ Form::open(array('url' => $_ENV['URL'] . '/search', 'class' => 'form-inline', 'id' => 'search-form', 'role' => 'form', 'method' => 'get')) }}
      <div class="form-group">
        <div class="input-group">
          {{ Form::text('search', '', array('class' => 'form-control', 'id' => 'search', 'placeholder' => 'Search All Products')) }}
        <span class="input-group-btn">
          {{ Form::submit('Go!', array('class' => 'btn btn-default submit-button')) }}
        </span>
        </div>
      </div>

      {{ Form::close() }}
      </div>
    <!-- End Search -->
    <div class="col-md-12">
      <ul class="catalog-categories list-group">
        @foreach($categories as $category)
          <li class="list-group-item">
            <span class="badge">
              {{ count(Product::wherecategory_id($category->id)->get()); }}
           </span>
            <a href="{{ $_ENV['URL'] }}/catalog/{{ $category->category_name }}">{{ $category->category_name }} </a>
          </li>
        @endforeach
      </ul>
    </div>
  </div>

  <div class="col-md-9 content">
    <div class="col-md-12">
        <h2>Results For <b>{{ $search }}</b></h2>
    </div>

  @include('layouts.catalog-items.catalogProducts')

@stop