@extends('layouts.base')

@section('title')
    Batteries Included - 404
@stop

@section('content')

    <div class="col-md-3"></div>
    <div class="col-md=6">
        <h2>Oops! It looks like the page you are trying to reach does not exist!</h2>

        <h3>Search Catalog</h3>
        <div class="search-products col-md-6">
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
    </div>
    <div class="col-md-3"></div>

@stop