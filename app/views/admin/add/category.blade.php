@extends('layouts.admin')

@section('title')
	Batteries Included - Add Category
@stop

@section('content')



	<div class="content-card col-md-10 col-md-offset-1">
		<h2>Add Category</h2>

		{{Form::open(array('url' =>  $_ENV['URL'] . '/admin/categories', 'class' => 'form-horizontal', 'id' => 'category-form', 'role' => 'form', 'method' => 'post'))}}

		    <div class="form-group">
		     	{{Form::label('parentcategory', 'Parent Category', array('class' => 'col-sm-3 control-label'))}}

		     	<div class="col-sm-5">
		       		<select class="form-control col-xs-4" id="parentcategory-id" name="parentcategory-id">
		            	<option value="selectparentcategory">-- Select a Category --</option>
		            	@foreach($categories as $category)
		                	<option value="{{$category->id}}">{{$category->category_name}}</option>
		            	@endforeach
		        	</select>
		      	</div>
		    </div>

		    <div class="form-group">
		      {{ Form::label('category-name', 'Category', array('class' => 'col-sm-3 control-label')) }}

		      <div class="col-sm-5">
		        {{ Form::text('category-name', '', array('class' => 'form-control', 'id' => 'category-name', 'placeholder' => 'Category Name')) }}
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