@extends('layouts.admin')

@section('title')
  Batteries Included - Edit Products
@stop

@section('content')


  <div class="table-responsive">
      <table class="table table-striped table-bordered">
      <th colspan="4">
          <h3>Products</h3>
      </th>
      <tr>
        <th>Name</th>
        <th>Category</th>
        <th>Edit/Delete</th>
      </tr>
      @foreach($products as $product)
          <tr>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->category->category_name }}</td>
            <td>
                <span class="btn btn-default btn-primary modal-admin">
                  <a href="{{ $_ENV['URL'] }}/admin/edit/product/{{ $product->id }}" data-toggle="modal">
                    <span class="glyphicon glyphicon-edit"></span> Edit
                  </a>
                </span>
                <span class="btn btn-default btn-danger modal-admin">
                  <a href="{{ $_ENV['URL'] }}/admin/delete/product/{{ $product->id }}" data-toggle="modal">
                    <span class="glyphicon glyphicon-trash"></span> Delete
                  </a>
                </span>
            </td>
          </tr>
      @endforeach
      </table>
  </div>
  <?php
  echo $products->links();
  ?>

@stop


