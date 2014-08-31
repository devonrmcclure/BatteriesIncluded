@extends('layouts.admin')

@section('title')
    Batteries Included - Add Category
@stop

@section('content')

<div class="col-md-10 content">
    @if(Session::has('flash-message'))
        <div class="col-md-3"></div>
            <div class="col-md-6">
                <span class="{{ Session::get('alert-class', 'alert-info') }}">
                    {{ Session::get('flash-message') }}
                </span>
          </div>
        <div class="col-md-3"></div>
    @endif

    <h2>
        Add Category
    </h2>

    <div class="text-center content">
        {{ Form::open(array('url' => 'http://batteriesincluded.dev/admin/add/category/post', 'class' => 'form-horizontal', 'id' => 'categoryadd-form', 'role' => 'form')) }}

        <div class="form-group">
          {{ Form::label('category-name', 'Category Name', array('class' => 'col-sm-2 control-label')) }}

          <div class="col-sm-5">
            {{ Form::text('category-name', '', array('class' => 'form-control', 'id' => 'category-name', 'placeholder' => 'Category Name')) }}
          </div>
        </div>

        {{ Form::submit('Submit', array('class' => 'btn btn-default submit-button submit-button', 'id' => 'submit-button', 'name' => 'submit')) }}

    {{ Form::close() }}
    </div>

    <h2>
        Add Subategory
    </h2>

    <div class="text-center content">
        {{ Form::open(array('url' => 'http://batteriesincluded.dev/admin/add/subcategory/post', 'class' => 'form-horizontal', 'id' => 'subcategoryadd-form', 'role' => 'form')) }}

        <div class="form-group">
          {{ Form::label('parentcategory-name', 'Parent Category Name', array('class' => 'col-sm-2 control-label')) }}

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
          {{ Form::label('subcategory-name', 'Subcategory Name', array('class' => 'col-sm-2 control-label')) }}

          <div class="col-sm-5">
            {{ Form::text('subcategory-name', '', array('class' => 'form-control', 'id' => 'subcategory-name', 'placeholder' => 'Subcategory Name')) }}
          </div>
        </div>

        {{ Form::submit('Submit', array('class' => 'btn btn-default submit-button submit-button', 'id' => 'submit-button', 'name' => 'submit')) }}

    {{ Form::close() }}
    </div>

    <h2>
        Add Product
    </h2>

    <div class="text-center content">
        {{ Form::open(array('url' => 'http://batteriesincluded.dev/admin/add/product/post', 'class' => 'form-horizontal', 'id' => 'productadd-form', 'role' => 'form')) }}

        <div class="form-group">
          {{ Form::label('productsubcategory-name', 'Subcategory', array('class' => 'col-sm-2 control-label')) }}

          <div class="col-sm-5">
            <select class="form-control col-xs-4" id="productsubcategory-name" name="productsubcategory-name">
                <option value="selectproductsubcategory">-- Select a Subcategory --</option>
                @foreach($subCategories as $subCategory)
                    <option value="{{ $subCategory->id }}">{{ $subCategory->subcategory_name }}</option>
                @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('product-name', 'Product', array('class' => 'col-sm-2 control-label')) }}

          <div class="col-sm-5">
            {{ Form::text('product-name', '', array('class' => 'form-control', 'id' => 'product-name', 'placeholder' => 'Product Name')) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('product-description', 'Description', array('class' => 'col-sm-2 control-label')) }}

          <div class="col-sm-5">
            {{ Form::textarea('product-description', '', array('class' => 'form-control', 'id' => 'product-description', 'placeholder' => 'Product Description')) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('product-price', 'Price', array('class' => 'col-sm-2 control-label')) }}

          <div class="col-sm-5">
            {{ Form::text('product-price', '0.00', array('class' => 'form-control', 'id' => 'product-price', 'placeholder' => 'Price')) }}
          </div>
        </div>

        <!--
            TODO: Upload image.
        -->

        {{ Form::submit('Submit', array('class' => 'btn btn-default submit-button submit-button', 'id' => 'submit-button', 'description' => 'submit')) }}

    {{ Form::close() }}
    </div>
</div>

@stop