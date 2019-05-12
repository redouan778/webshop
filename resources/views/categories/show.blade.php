@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Kuch kuch bi</h1>
            <div class="row">
              @if($category < 0)
                <p>hoi</p>
              @else
              @foreach ($products as $product)
                  <div class="card" style="width: 18rem;" >
                    <img class="card-img-top" src="..." alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">{{$product->description}}</p>
                        <p class="card-text">€ {{$product->price}}</p>
                        <a href="{{ route('AddToShoppingCart', $product->id) }}" class="btn btn-primary">Add Product to Cart</a>
                      </div>
                    </div>
                @endforeach
@endif
        </div>
      </div>
    </div>
</div>
@endsection
