@extends('layouts.admin')

@section('title')
    Batteries Included - Edit Subcategory
@stop

@section('content')

    <h2>
        Edit Subcategory Name
    </h2>

        {{ Form::open(array('url' => $_ENV['URL'] . '/admin/edit/subcategory', 'class' => 'form-horizontal', 'id' => 'categoryedit-form', 'role' => 'form', 'method' => 'put')) }}

        <div class="form-group">
          {{ Form::label('parentcategory-name', 'Parent Category Name', array('class' => 'col-sm-3 control-label')) }}

          <div class="col-sm-5">
            <select class="form-control col-xs-4" id="parentcategory-name" name="parentcategory-name">
                <option value="selectparentcategory">-- Select a Parent Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('subcategory-name', 'Subcategory Name', array('class' => 'col-sm-3 control-label')) }}

          <div class="col-sm-5">
            {{ Form::text('subcategory-name', $subCategory->subcategory_name, array('class' => 'form-control', 'id' => 'subcategory-name', 'placeholder' => 'Subcategory Name')) }}
          </div>

          <div class="col-sm-5">
          {{ Form::hidden('subcategory-id', $subCategory->id, array('class' => 'form-control', 'id' => 'subCategory-id', 'placeholder' => 'Subcategory ID')) }}
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-10">
            {{ Form::submit('Submit', array('class' => 'btn btn-default submit-button submit-button', 'id' => 'submit-button', 'name' => 'submit')) }}
          </div>
        </div>

    {{ Form::close() }}

@stop