@extends('layouts.admin')

@section('title')
    Batteries Included - Edit {{ $product->product_name }}
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
        Edit Product
    </h2>


        {{ Form::open(array('url' =>  $_ENV['URL'] . '/admin/edit/product/' . $product->id, 'class' => 'form-horizontal', 'id' => 'productadd-form', 'role' => 'form', 'method' => 'put', 'files' => true)) }}

        <div class="form-group">
          {{ Form::label('productsubcategory-name', 'Subcategory', array('class' => 'col-sm-3 control-label')) }}

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
          {{ Form::label('product-name', 'Product', array('class' => 'col-sm-3 control-label')) }}

          <div class="col-sm-5">
            {{ Form::text('product-name', $product->product_name, array('class' => 'form-control', 'id' => 'product-name', 'placeholder' => 'Product Name')) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('product-description', 'Description', array('class' => 'col-sm-3 control-label')) }}

          <div class="col-sm-5">
            {{ Form::textarea('product-description', $product->product_description, array('class' => 'form-control', 'id' => 'product-description', 'placeholder' => 'Product Description')) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('product-price', 'Price', array('class' => 'col-sm-3 control-label')) }}

          <div class="col-sm-5">
            {{ Form::text('product-price', $product->price, array('class' => 'form-control', 'id' => 'product-price', 'placeholder' => 'Price')) }}
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