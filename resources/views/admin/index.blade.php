@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Welcome at the Admin Page.</h1>

                <br>
                <br>
                <br>
                <br>

                <h2>All Categories</h2>

                <table class="table tablee table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category name</th>
                        <th scope="col"><a href="{{ route('categories.create') }}">+</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $product)

                        <tr>
                        <th scope="row">1</th>
                        <td>{{$product->name}}</td>
                        <td>
                            <form action="{{route('categories.destroy', $product['id'])}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                            </form>

                            <form action="{{route('categories.edit', $product['id'])}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('GET') }}
                                <button class="btn btn-success btn-sm"><i class="fa fa-wrench"></i></button>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
