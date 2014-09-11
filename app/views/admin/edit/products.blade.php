@extends('layouts.admin')

@section('title')
  Batteries Included - Edit Products
@stop

@section('content')

<div class="col-md-10 content">
  <div class="flash-message row">
    @if(Session::has('flash-message'))
        <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close/span></button>
          {{ Session::get('flash-message') }}
        </div>
    @endif
  </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
        <th colspan="4">
            <h3>Products</h3>
        </th>
        <tr>
          <th>Name</th>
          <th>Category</th>
          <th>Subcategory</th>
          <th>Edit/Delete</th>
        </tr>
        @foreach($products as $product)
            <tr>
              <td>{{ $product->product_name }}</td>
              <td>{{ $product->category->category_name }}</td>
              <td>{{ $product->subcategory->subcategory_name }}</td>
              <td>
                  <a href="{{ $_ENV['URL'] }}/admin/edit/product/{{ $product->id }}"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit"> Edit</button></a>
                  <a href="{{ $_ENV['URL'] }}/admin/delete/product/{{ $product->id }}"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"> Delete</button></a>
              </td>
            </tr>
        @endforeach
        </table>
    </div>
    <?php
    echo $products->links();
    ?>
</div>

@stop