@extends('layouts.admin')

@section('title')
    Batteries Included - Edit Category
@stop

@section('content')

    <h2>
        Edit Category Name
    </h2>

        {{ Form::open(array('url' => $_ENV['URL'] . '/admin/edit/category/$category->id', 'class' => 'form-horizontal', 'id' => 'categoryedit-form', 'role' => 'form', 'method' => 'put')) }}

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

@stop