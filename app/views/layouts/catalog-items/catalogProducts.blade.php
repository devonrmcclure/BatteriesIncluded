    @if(count($products) == 0)
      <div class="col-md-12">
        <p>There doesn't seem to be anything here!</p>
        @if(Auth::check())
          Why not <a href="{{ $_ENV['URL'] }}/admin/add#product">add a product?</a>
        @endif
      </div>
    @else
      @foreach($products as $product)
        <div class="col-md-4 product-tile">
            <div class="col-md-12 img-catalog">
              <a href="#" data-toggle="modal" data-target="#productModal{{$product->id}}">
                <img src="{{ $_ENV['URL'] }}/img/catalog/{{ $product->image }}" class="img-responsive" />
              </a>
            </div>
                <small><b>Brand:</b> {{ $product->brand }} </small><br />
                <small><b>Category:</b> <a href="{{ $_ENV['URL'] }}/catalog/{{ $product->subcategory->subcategory_name }}"> {{ $product->subcategory->subcategory_name }} </a></small><br />

                @if($product->quantity != 0)
                  <small class='in-stock'>In Stock!</small>
                @else
                  <small class='out-of-stock'>Out Of Stock!</small>
                @endif

                <h5 class="product-name">{{ $product->product_name }}</h5>

                <p class="product-description">
                    {{ Str::limit($product->product_description, 120) }}
                </p>

                <span class="pull-left btn btn-md btn-primary product-price">
                  <a href="#" data-toggle="modal" data-target="#productModal{{$product->id}}">
                    View
                  </a>
                </span>
                @if($product->price != 0.00)
                  <span class="pull-right btn btn-md btn-primary product-price">${{ $product->price }}</span>
                @else
                  <!-- TODO: Modal with phone number to call and pre-filled out form with email
                  querying about price of item.-->
                  <span class="pull-right btn btn-md btn-primary product-price">Call or Email for price</span>
                @endif
        </div>

        <div class="modal fade" id="productModal{{ $product->id }}" role="dialog" aria-labelledby="productModal{{ $product->id }}" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ $product->product_name }}</h4>
              </div>
              <div class="modal-body">
                  @if($product->price != 0.00)
                    <span class="pull-right btn btn-md btn-primary product-price">${{ $product->price }}</span>
                  @else
                    <span class="pull-right btn btn-md btn-primary product-price">Call for price</span>
                  @endif
                  <img src="{{ $_ENV['URL'] }}/img/catalog/{{ $product->image }}" class="img-responsive center-block" />
                  <div class="center-block">
                      <small><b>Brand:</b> {{ $product->brand }} </small><br />
                      <small><b>Category:</b> <a href="{{ $_ENV['URL'] }}/catalog/{{ $product->subcategory->subcategory_name }}"> {{ $product->subcategory->subcategory_name }} </a></small><br />

                      @if($product->quantity != 0)
                        <small class='in-stock'>In Stock!</small>
                      @else
                        <small class='out-of-stock'>Out Of Stock!</small>
                      @endif
                      <h4 class="product-name">{{ $product->product_name }}</h4>

                      <p class="product-description">
                          {{ $product->product_description}}
                      </p>
                  </div>
              </div>
              <div class="modal-footer">
                @if(Auth::check())
                  <span class="pull-left btn btn-default btn-primary modal-admin">
                    <a href="{{ $_ENV['URL'] }}/admin/edit/product/{{ $product->id }}" data-toggle="modal">
                      <span class="glyphicon glyphicon-edit"></span> Edit
                    </a>
                  </span>

                  <span class="pull-left btn btn-default btn-danger modal-admin">
                    <a href="{{ $_ENV['URL'] }}/admin/delete/product/{{ $product->id }}" data-toggle="modal">
                      <span class="glyphicon glyphicon-trash"></span> Delete
                    </a>
                  </span>
                @endif
                <button type="button" class="btn btn-default btn-primary product-price" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    @endif

</div>
<div class="col-md-3"></div>
<div class="row content text-center product-pagination">
  <?php
    // Pagination links
    echo $products->links();
  ?>
</div>