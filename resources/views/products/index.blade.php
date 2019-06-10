@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Home page</h1>
            <div class="row">
            @foreach ($products as $product)
               <?php
                $productCat = array($product->categories->pluck('name'));
                $leeg = ['t'];
                ?>
                    <div class="card" style="width: 18rem;" >
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">{{$product->description}}</p>
                            <p class="card-text">€ {{$product->price}}</p>
                            <p class="card-text"> {{implode($productCat ?  :  $leeg) }}</p>

                            <a href="{{ route('AddToShoppingCart', $product->id) }}" class="btn btn-primary">Add Product to Cart</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

