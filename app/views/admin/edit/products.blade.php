@extends('layouts.admin')

@section('title')
  Batteries Included - Catalog
@stop

@section('content')

<div class="col-md-10 content">
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
                  <a href="{{ $_ENV['URL'] }}/admin/edit/product/{{ $product->id }}"><button type="button" class="btn btn-primary">Edit</button></a>
                  <a href="#"><button type="button" class="btn btn-danger">Delete</button></a>
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