@extends('layouts.admin')

@section('title')
  Batteries Included - Edit Products
@stop

@section('content')

<div class="col-md-10 content">
  <div class="flash-message row">
    @if(Session::has('flash-message'))
        <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close/span></button>
          {{ Session::get('flash-message') }}
        </div>
    @endif
  </div>
  <h2>Edit Products</h2>


  <h4>Choose A Category</h4>
    <ul>
    @foreach($categories as $category)
      <li><a href="{{ $_ENV['URL'] }}/admin/edit/products/{{$category->category_name}}">{{$category->category_name}}</a></li>
    @endforeach
    </ul>
</div>

@stop