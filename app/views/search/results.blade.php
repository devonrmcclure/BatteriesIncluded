@extends('layouts.base')

@section('title')
  Batteries Included - Search Results
@stop

@section('content')
    <div class="col-md-4">
            <h2>
                Categories
            </h2>
            <!-- Search -->
            <div class="search-products">
                {{ Form::open(array('url' => $_ENV['URL'] . '/search', 'class' => 'form-inline', 'id' => 'search-form', 'role' => 'form', 'method' => 'GET')) }}
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
            <div class="col-md-10">
                <ul class="nav nav-list catalog-categories ">
                {{ $menu }}
                </ul>
            </div>
        </div>

  <div class="col-md-8 content">
    <div class="col-md-12">
        <h2>Results For <b>{{ $search }}</b></h2>
    </div>


  @include('layouts.catalog-items.catalogProducts')

  </div>

@stop