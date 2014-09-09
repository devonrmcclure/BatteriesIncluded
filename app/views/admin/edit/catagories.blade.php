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


        {{ Form::open(array('url' => $_ENV['URL'] . '/admin/edit/category/', 'class' => 'form-horizontal', 'id' => 'categoryedit-form', 'role' => 'form')) }}
        <div class="form-group">
          {{ Form::label('category-name', 'Category Name', array('class' => 'col-sm-3 control-label')) }}

          <div class="col-sm-5">
            <select class="form-control col-xs-4" id="category-name" name="category-name">
                <option value="selectcategory">-- Select a Category to Edit--</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-10">
            {{ Form::submit('Submit', array('class' => 'btn btn-default submit-button submit-button', 'id' => 'submit-button', 'name' => 'submit')) }}
          </div>
        </div>

    {{ Form::close() }}


    <h2>
        Edit Subategory
    </h2>


        {{ Form::open(array('url' => $_ENV['URL'] . '/admin/edit/subcategory', 'class' => 'form-horizontal', 'id' => 'subcategoryadd-form', 'role' => 'form')) }}

        <div class="form-group">
          {{ Form::label('subcategory-name', 'Subcategory Name', array('class' => 'col-sm-3 control-label')) }}

          <div class="col-sm-5">
            <select class="form-control col-xs-4" id="subcategory-name" name="subcategory-name">
                <option value="selectsubcategory">-- Select a Subcategory to Edit--</option>
                @foreach($subCategories as $subCategory)
                    <option value="{{ $subCategory->id }}">{{ $subCategory->subcategory_name }}</option>
                @endforeach
             </select>
            </select>
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