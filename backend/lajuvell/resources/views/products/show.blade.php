<!-- resources/views/products/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <p>Price: Rp.{{ $product->price }}</p>
            <p>Quantity: {{ $product->stock }}</p>
            <p>Description: {{ $product->description }}</p>
        </div>
        <div class="col-md-6">
            @if($product->link_gambar)
                <img src="{{ asset('fotoproduk/' . $product->link_gambar) }}" alt="{{ $product->name }}" style="max-width: 300px;">
            @else
                No Image
            @endif
        </div>
    </div>
    <div class="container">
        //keranjang
        <form action="{{ route('cart.add', ['productId' => $product->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="price" value="{{ $product->price }}">
            <input type="number" name="quantity" value="1"> <!-- You can set a default quantity if needed -->
            <input type="hidden" name="shipping_address" value="alamat rumah"> <!-- You can set a default shipping address if needed -->
            <button type="submit">Add to Cart</button>
        </form>

        <!-- Pembelian -->
        <form action="{{ route('purchase') }}" method="POST">
            @csrf
            <!-- Add any additional fields or data related to the purchase here -->
            <button type="submit">keranjang</button>
        </form>

        <form action="{{ route('payment.form') }}" method="GET">
            @csrf
            <!-- Add any additional fields or data related to the purchase here -->
            <button type="submit">Buy Now</button>
        </form>
    </div>
</div>
@endsection
