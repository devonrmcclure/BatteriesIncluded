@extends('layouts.admin')

@section('title')
    Batteries Included - Edit Categories Index
@stop

@section('content')

<div class="col-md-8 content">
    <div class="flash-message row">
      @if(Session::has('flash-message'))
          <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close/span></button>
            {{ Session::get('flash-message') }}
          </div>
      @endif
    </div>
    <h2>
        Edit Category
    </h2>
    <ul>
    @foreach($categories as $category)
      <li><a href="{{ $_ENV['URL'] }}/admin/edit/category/{{ $category->id }}">{{ $category->category_name }}</a></li>
    @endforeach
    </ul>
</div>

@stop