@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Right product page</h1>
                <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product to Cart</a>

                <div class="row">
                    @foreach ($products as $product)

                        <div class="card" style="width: 18rem;" >
                            <img class="card-img-top" src="..." alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{$product->name}}</h5>
                                <p class="card-text">{{$product->description}}</p>
                                <p class="card-text">€ {{$product->price}}</p>
                                <a href="{{ route('AddToShoppingCart', $product->id) }}" class="btn btn-primary">Add Product to Cart</a>
                                <form action="{{route('products.destroy',  $product->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
