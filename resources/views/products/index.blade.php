@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>voorbeeld index</h1>
            <!-- @foreach ($products as $product)
              @if($product->shoppingCart === 0)
                <pre>
                  {{$product->name}}
                </pre>
              @endif
            @endforeach -->
            @foreach ($categories as $categorie)
              <li><a  class="navbar-brand" href="{{ route('category', $categorie->id) }}">{{$categorie['name']}}</a></li>
            @endforeach




      <div class="row">
        @foreach ($products as $product)
        @if ($product->shopping_cart > 0)
          <div class="card" style="width: 18rem;" >
            <p>Zit in je mandje</p>
            <img class="card-img-top" src="..." alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="card-text">{{$product->description}}</p>
                <p class="card-text">€ {{$product->price}}</p>
                <a href="{{ route('AddToShoppingCart', $product->id) }}" class="btn btn-primary">Add Product to Cart</a>
              </div>
            </div>
          @else
            <div class="card" style="width: 18rem;" >
              <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{$product->name}}</h5>
                  <p class="card-text">{{$product->description}}</p>
                  <p class="card-text">€ {{$product->price}}</p>
                  <a href="{{ route('AddToShoppingCart', $product->id) }}" class="btn btn-primary">Add Product to Cart</a>
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>
    </div>
</div>
@endsection
