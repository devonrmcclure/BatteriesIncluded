@extends('layouts.admin')

@section('title')
    Batteries Included - Add Catalog Item
@stop

@section('content')

<div class="col-md-8 content">
    <div class="flash-message row">
      @if(Session::has('flash-message'))
          <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            {{ Session::get('flash-message') }}
          </div>
      @endif
    </div>
    <a id="category"></a>
    <h2>
        Add Category
    </h2>


        {{ Form::open(array('url' => $_ENV['URL'] . '/admin/add/category', 'class' => 'form-horizontal', 'id' => 'categoryadd-form', 'role' => 'form')) }}

        <div class="form-group">
          {{ Form::label('category-name', 'Category Name', array('class' => 'col-sm-3 control-label')) }}

          <div class="col-sm-5">
            {{ Form::text('category-name', '', array('class' => 'form-control', 'id' => 'category-name', 'placeholder' => 'Category Name')) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('parent-category', 'Parent Category', array('class' => 'col-sm-3 control-label')) }}

          <div class="col-sm-5">
            <select class="form-control col-xs-4" id="parent-cateogry" name="parent-category">
                <option value="selectparentcategory">-- Select a Category --</option>
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

    <a id="product"></a>
    <h2>
        Add Product
    </h2>


        {{ Form::open(array('url' =>  $_ENV['URL'] . '/admin/add/product', 'class' => 'form-horizontal', 'id' => 'productadd-form', 'role' => 'form', 'files' => true, 'method' => 'post')) }}

        <div class="form-group">
          {{ Form::label('productcategory-name', 'Category', array('class' => 'col-sm-3 control-label')) }}

          <div class="col-sm-5">
            <select class="form-control col-xs-4" id="productcategory-name" name="productcategory-name">
                <option value="selectproductcategory">-- Select a Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('product-name', 'Product', array('class' => 'col-sm-3 control-label')) }}

          <div class="col-sm-5">
            {{ Form::text('product-name', '', array('class' => 'form-control', 'id' => 'product-name', 'placeholder' => 'Product Name')) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('product-description', 'Description', array('class' => 'col-sm-3 control-label')) }}

          <div class="col-sm-5">
            {{ Form::textarea('product-description', '', array('class' => 'form-control', 'id' => 'product-description', 'placeholder' => 'Product Description')) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('product-brand', 'Brand', array('class' => 'col-sm-3 control-label')) }}

          <div class="col-sm-5">
            {{ Form::text('product-brand', '', array('class' => 'form-control', 'id' => 'product-brand', 'placeholder' => 'Brand')) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('product-quantity', 'Quantity', array('class' => 'col-sm-3 control-label')) }}

          <div class="col-sm-5">
            {{ Form::text('product-quantity', '1', array('class' => 'form-control', 'id' => 'product-quantity', 'placeholder' => 'Quantity')) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('product-price', 'Price', array('class' => 'col-sm-3 control-label')) }}

          <div class="col-sm-5">
            {{ Form::text('product-price', '0.00', array('class' => 'form-control', 'id' => 'product-price', 'placeholder' => 'Price')) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('image', 'Image', array('class' => 'col-sm-3 control-label')) }}

          <div class="col-sm-5">
            {{ Form::file('image', '', array('class' => 'form-control', 'id' => 'image')) }}
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