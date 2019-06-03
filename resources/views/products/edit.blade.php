@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <form action="{{route('products.update', $product)}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="naam" class="col-sm-2 control-label">Product name</label>
                        <div class="col-sm-6">
                            <input type="text" id="naam" name="name" class="form-control" value="{{$product->name}}" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="naam" class="col-sm-2 control-label">Product description</label>
                        <div class="col-sm-6">
                            <input type="text" id="naam" name="description" class="form-control" value="{{$product->description}}" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="naam" class="col-sm-2 control-label">Product price</label>
                        <div class="col-sm-6">
                            <input type="text" id="naam" name="price" class="form-control" value="{{$product->price}}" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-PP btn-BO">Save changes</button>
                        </div>
                    </div>
                    </form>
            </div>
@endsection
