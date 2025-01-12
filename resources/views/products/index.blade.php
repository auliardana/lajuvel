<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>All Products</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            @if($product->link_gambar)
                                <a href="/products/{{$product->id}}"><img src="{{ asset('fotoproduk/' . $product->link_gambar) }}" alt="{{ $product->name }}" style="max-width: 100px;"></a>
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ $product->description}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
