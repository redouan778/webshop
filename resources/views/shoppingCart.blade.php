@extends('layouts.app')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    @php
        $totalPrice = 0;
    @endphp



    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <div class="container">
        @if(is_array($products))


        <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
            </tr>
            </thead>
            <tbody>
                <tr>

                @foreach($products as $product)
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
                                <div class="col-sm-10">
                                    <h4 class="nomargin">{{$product->name}}</h4>
                                    <p>{{$product->description}}</p>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">€ {{$product->price}},-</td>
                        <td data-th="Quantity">
                            <input type="number" class="form-control text-center" value="{{$product->quantity}}">
                        </td>
                        <td data-th="Subtotal" class="text-center">€ {{ $product['price'] * $product['quantity'] }},-</td>
                        <td class="actions" data-th="">
                            <a class="btn btn-danger btn-sm" href="{{route('deleteOneProduct', $product['id'])}}"><i class="fa fa-trash-o"></i></a>
                        </td>
                </tr>
                    @php
                        $totalPrice += $product['price'] * $product['quantity'];
                    @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td><a href="{{route('home')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                    <td colspan="2" class="hidden-xs"><a class="btn btn-danger btn-xs dropdown-toogle" href="{{ route('deleteAllProducts') }}">
                            Delete All Products
                        </a></td>
                    <td class="hidden-xs text-center"><strong>€ {{$totalPrice}},-</strong></td>
                    <td><a href="{{route('checkout')}}" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                </tr>
            </tfoot>
        </table>
        @else
            <div class="row">
                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                    <h2>No Items
                        {{print_r($leeg)}}
                        Cart!</h2>
                </div>
            </div>
        @endif
    </div>
@endsection