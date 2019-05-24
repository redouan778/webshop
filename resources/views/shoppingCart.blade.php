@extends('layouts.app')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(Session::has('cart'))
                    <pre>
                        {{--{{print_r($productsInCart)}}--}}
                    </pre>x
                    @foreach($productsInCart as $product)
                        <li class="list-group-item">
                            <strong class="shoppingcartStyling">{{$product->name}}</strong>

                            <input type=number min=0 max=15 value="{{$product->amount}}">

                            <span>€ {{$product->price}}</span>
                            <a class=" fas fa-trash-alt delete" href="#"></a>
                        </li>
                    @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total Price: {{$totalPrice}}</strong>
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
        @else
            <div class="row">
                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                    <h2>No Items in Cart!</h2>
                </div>
            </div>
        @endif
    </div>
@endsection