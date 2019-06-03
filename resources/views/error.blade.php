@extends('layouts.app')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    <div class="container">
        <p>burp geen toegang</p>
    </div>

    @if((auth()->user(['isAdmin'])) == "yes")
        <p>admin</p>
    @else
        <p>weh admin
        @endif</p>
@endsection