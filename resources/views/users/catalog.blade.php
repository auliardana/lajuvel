@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Product Catalog</h1>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $product->link_gambar }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">Category: {{ $product->category }}</p>
                    <p class="card-text">Size: {{ $product->size }}</p>
                    <p class="card-text">Price: {{ $product->price }}</p>
                    <p class="card-text">Stock: {{ $product->stock }}</p>
                    <p class="card-text">{{ $product->description }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
