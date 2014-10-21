@extends('layouts.front')

@section('content')
  <div class="row display-products productlist">
  	@foreach ($products as $product)
    <div class="col-lg-3 col-md-4 col-xs-12 col-sm-6  product" 
    @if( $product->price ) 
      data-price={{ $product->price }}
    @endif 
    >
      <div class="content">
        <a class="cropped" href="{{ $product->link  }}" target="_blank">
          <img src="/photos/{{ $product->photo }}" alt="{{ $product->name }}">
          <h2>{{ $product->name }}</h2></a>

        <p class="price">
          @if($product->price)
            <a href="{{ $product->link }}" target="_blank" class="large">
            @if(is_float(number_format($product['price'] / 100)))
              ${{ number_format($product['price'] / 100, 2) }}
            @else
              ${{ number_format($product['price'] / 100, 0) }}
            @endif
            </a>
          @else
            <a href="{{ $product['link'] }}" target="_blank" class="btn btn-primary">View Price</a>
          @endif
        </p>
      </div>
    </div>
    @endforeach
  </div>
<div class="row">
  {!!  $products->links() !!}
</div>

@stop
