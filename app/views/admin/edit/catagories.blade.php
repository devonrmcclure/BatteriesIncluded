@extends('layouts.admin')

@section('title')
    Batteries Included - Edit Categories Index
@stop

@section('content')

    <h2>
        Edit Category
    </h2>
    <ul>
    @foreach($categories as $category)
      <li><a href="{{ $_ENV['URL'] }}/admin/edit/category/{{ $category->id }}">{{ $category->category_name }}</a></li>
    @endforeach
    </ul>

@stop