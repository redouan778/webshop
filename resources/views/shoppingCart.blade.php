@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          @if(count($orders) === 0)
            <h3>Shopping Cart</h3>
            <p>You Have not selected any product yet.</p>
          @endif
          <a href="{{ url('homepage') }}" class="btn btn-primary">< Go back to the products</a>

      </div>
    </div>
</div>

<div class="shopping-cart">
  <!-- Title -->
  <div class="title">
    Shopping Bag
  </div>
  @foreach ($orders as $order)

  <!-- Product #1 -->
  <div class="item">
    <div class="buttons">
      <span class="delete-btn"></span>
      <span class="like-btn"></span>
    </div>

    <div class="image">
      <img src="item-1.png" alt="sku" />
    </div>

    <div class="description">
      <span>{{$order->name}}</span>

    </div>

    <div class="quantity">
      <button class="plus-btn" type="button" name="button">
        <img src="plus.svg" alt="" />
      </button>
      <input type="text" name="name" value="1">
      <button class="minus-btn" type="button" name="button">
        <img src="minus.svg" alt="" />
      </button>
    </div>

    <div class="total-price">€{{$order->price}}</div>
  </div>
  @endforeach
</div>
@endsection
