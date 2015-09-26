@extends('layouts.admin')

@section('title')
	Batteries Included - Edit Category
@stop

@section('content')



	<div class="content-card col-md-10 col-md-offset-1">
		<h2>Edit {{$category->category_name}}</h2>

		{{Form::open(array('url' =>  $_ENV['URL'] . '/admin/categories/' . $category->id, 'class' => 'form-horizontal', 'id' => 'category-form', 'role' => 'form', 'method' => 'put', 'files' => true))}}

		    <div class="form-group">
		     	{{Form::label('parentcategory', 'Parent Category', array('class' => 'col-sm-3 control-label'))}}

		     	<div class="col-sm-5">
		       		<select class="form-control col-xs-4" id="parentcategory-id" name="parentcategory-id">
		            	<option value="selectparentcategory">-- Select a Category --</option>
		            	<!-- For some reason, if we keep the foreach as $category, it makes the input for changing the name always be "Waring Pro" (category ID 36), so we must use $categoryy to prevent this -->
		            	@foreach($categories as $categoryy)
		                	<option value="{{$categoryy->id}}">{{$categoryy->category_name}}</option>
		            	@endforeach
		        	</select>
		      	</div>
		    </div>

		    <div class="form-group">
		      {{ Form::label('category-name', 'Category', array('class' => 'col-sm-3 control-label')) }}

		      <div class="col-sm-5">
		        {{ Form::text('category-name', $category->category_name, array('class' => 'form-control', 'id' => 'category-name', 'placeholder' => 'Category Name')) }}
		      </div>
		    </div>

		    <div class="form-group">
		      <div class="col-sm-offset-3 col-sm-10">
		        {{ Form::submit('Submit', array('class' => '', 'id' => 'submit-button', 'name' => 'submit')) }}
		      </div>
		    </div>

		{{ Form::close() }}
	</div>
@stop