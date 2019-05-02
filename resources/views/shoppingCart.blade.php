@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          @if(count($orders) === 0)
            winkelkar is leeg
          
          @endif
            @foreach ($orders as $order)
            <div class="card" style="width: 18rem;" >
              <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{$order->name}}</h5>
                  <p class="card-text">{{$order->description}}</p>
                  <p class="card-text">€ {{$order->price}}</p>
                  <a href="{{ url('#') }}" class="btn btn-primary">Add Product to Cart</a>
                </div>
              </div>
              @endforeach
      </div>
    </div>
</div>
@endsection
