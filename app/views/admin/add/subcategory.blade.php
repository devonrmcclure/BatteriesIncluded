@extends('layouts.admin')

@section('title')
    Batteries Included - Add Subcategory
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


    </div>

@stop