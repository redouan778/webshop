@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <form action="{{route('products.store')}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="naam"  class="col-sm-2 control-label">Product name</label>
                        <div class="col-sm-6">
                            <input type="text"  name="name" class="form-control" placeholder="Category name">
                        </div>

                        <label for="naam"  class="col-sm-2 control-label">Product description</label>
                        <div class="col-sm-6">
                            <input type="text"  name="description" class="form-control" placeholder="Category name">
                        </div>

                        <label for="naam"  class="col-sm-2 control-label">Category price</label>
                        <div class="col-sm-6">
                            <input type="text" name="price" class="form-control" placeholder="Category name">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add product</button>
                        </div>
                    </div>

                    <button class="btn btn-primary">
                        <i class="fa fa-backward"><a class="back" href="{{route('adminPanel')}}" style="color: white">  Vorige pagina</a></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
