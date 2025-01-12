@extends('layouts.app') <!-- Assuming you have a layout file (e.g., app.blade.php) that defines the common structure -->

@section('content')
    <div class="container">
        <h1>Add to Cart</h1>
        <form action="{{ route('addToCart') }}" method="POST">
            @csrf

            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" required>

            <label for="price">Price:</label>
            <input type="number" name="price" required>

            <label for="shipping_address">Shipping Address:</label>
            <input type="text" name="shipping_address" required>

            <button type="submit">Add to Cart</button>
        </form>
    </div>
@endsection
