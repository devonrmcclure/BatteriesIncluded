@extends('layouts.admin')

@section('title')
  Batteries Included - Edit Products
@stop

@section('content')

  <h2>Edit Products</h2>


  <h4>Choose A Category</h4>
    <ul>
    @foreach($categories as $category)
      <li><a href="{{ $_ENV['URL'] }}/admin/edit/products/{{$category->category_name}}">{{$category->category_name}}</a></li>
    @endforeach
    </ul>

@stop