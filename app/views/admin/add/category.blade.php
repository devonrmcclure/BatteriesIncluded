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


    </div>

@stop