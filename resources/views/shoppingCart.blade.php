@extends('layouts.app')

@section('title')
  Laravel Shopping Cart
@endsection

@section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">

            <li class="list-group-item">
              <strong class="shoppingcartStyling">iphone 6s</strong>

                <input type=number min=0 max=15 value="2">

                <span>€ 300</span>
                <a class=" fas fa-trash-alt delete" href=""></a>
            </li>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <strong>Total Price: € 234</strong>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
          <a class="btn btn-danger btn-xs dropdown-toogle" href="{{ route('deleteAllProducts') }}">
            Delete All Products
          </a>
          <button type="button" class="btn btn-success">Checkout</button>
      </div>
    </div>
    {{--<div class="row">--}}
      {{--<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">--}}
        {{--<h2>No Items in Cart!</h2>--}}
      {{--</div>--}}
    {{--</div>--}}
    </div>
@endsection