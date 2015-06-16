@extends('layouts.admin')

@section('title')
    Batteries Included - Delete Product
@stop

@section('content')


    <h2>
        Delete Product
    </h2>

        <div class="alert alert-danger" role="alert">
          About to delete product <b>{{ $product->product_name }}</b> click delete to proceed!
        </div>

        {{ Form::open(array('url' =>  $_ENV['URL'] . '/admin/delete/product/' . $product->id, 'class' => 'form-horizontal', 'id' => 'productadd-form', 'role' => 'form', 'method' => 'delete')) }}
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-10">
            {{ Form::submit('Delete', array('class' => 'btn btn-default submit-button submit-button', 'id' => 'submit-button', 'name' => 'submit')) }}
          </div>
        </div>

    {{ Form::close() }}


@stop