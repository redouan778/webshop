@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>voorbeeld</h1>


            @foreach ($products as $product)
<div class="card" >
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{$product->product_name}}</h5>
                  <p class="card-text">{{$product->product_description}}</p>
                  <p class="card-text">€ {{$product->product_price}}</p>
                  <a href="#" class="btn btn-primary">Add Product to Cart</a>
                </div>
              </div>

            @endforeach
      </div>
    </div>
</div>
@endsection
