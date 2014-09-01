@extends('layouts.admin')

@section('title')
    Batteries Included - Edit Category Name
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
        Edit Category Name
    </h2>

        {{ Form::open(array('url' => 'http://batteriesincluded.dev/admin/edit/category', 'class' => 'form-horizontal', 'id' => 'categoryedit-form', 'role' => 'form', 'method' => 'put')) }}

        <div class="form-group">
          {{ Form::label('category-name', 'Category Name', array('class' => 'col-sm-3 control-label')) }}

          <div class="col-sm-5">
            {{ Form::text('category-name', $category->category_name, array('class' => 'form-control', 'id' => 'category-name', 'placeholder' => 'Category Name')) }}
          </div>

          <div class="col-sm-5">
          {{ Form::hidden('category-id', $category->id, array('class' => 'form-control', 'id' => 'category-id', 'placeholder' => 'Category ID')) }}
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-10">
            {{ Form::submit('Submit', array('class' => 'btn btn-default submit-button submit-button', 'id' => 'submit-button', 'name' => 'submit')) }}
          </div>
        </div>

    {{ Form::close() }}
</div>

@stop