@extends('layouts.base')

@section('title')
  Batteries Included - Search Results
@stop

@section('content')
    <div class="col-md-12">
        <div class="content-card col-md-12">
            <h2>Results For <b>{{ $search }}</b></h2>
        </div>

        @include('layouts.catalog-items.menu')

        @for($i = 0; $i < count($products); $i++)
            @foreach($products[$i] as $product)
                <div class="content-card product-tile col-md-2">
                    <img src="/img/catalog/{{$product->image}}" class="img-responsive product-img" alt="{{$product->product_name}}"/>

                    <h4 class="product-name">{{Str::limit($product->product_name, 35)}}</h4>

                    <p class="product-description">
                        @if($product->product_description)
                            {{Str::limit($product->product_description, 40)}}
                        @else
                            There is no description for this product.
                        @endif
                    </p>

                    <p class="material-flat-button material-flat-product ripple-effect"><a href="/catalog/product/{{$product->slug}}">More Info</a></p>
                </div>
            @endforeach
        @endfor



    </div>

@stop