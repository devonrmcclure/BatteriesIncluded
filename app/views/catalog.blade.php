@extends('layouts.base')

@section('title')
  Batteries Included - Catalog
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
            <h2>{{{ isset($category) ? $category[0]->category_name : 'Newest Products' }}}</h2>
            <ol class="breadcrumb">
                @if(isset($category))
                    <li><a href=" {{ $_ENV['URL'] }}/catalog">Catalog Home</a></li>
                    @for($i = count($breadcrumbs)-1; $i >= 0; $i--)
                        {{ $breadcrumbs[$i] }}
                    @endfor
                @endif
            </ol>
            @include('layouts.catalog-items.catalogProducts')
        </div>
    </div>
@stop