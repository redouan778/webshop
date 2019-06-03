@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <form action="{{route('categories.update', $category)}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="naam" class="col-sm-2 control-label">Category name</label>
                        <div class="col-sm-6">
                            <input type="text" id="naam" name="name" class="form-control" value="{{$category->name}}" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-PP btn-BO">Save changes</button>
                        </div>
                    </div>
            </div>
@endsection
