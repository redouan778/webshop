@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Kuch kuch biyc</h1>

      <div class="row">
        @foreach ($category->products as $product)
          <div class="card" style="width: 18rem;" >
            <img class="card-img-top" src="..." alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="card-text">{{$product->description}}</p>
                <p class="card-text">€ {{$product->price}}</p>
                <a href="{{ url('shoppingCart', $product->id) }}" class="btn btn-primary">Add Product to Cart</a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
</div>
@endsection
