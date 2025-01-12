@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Update Cart</h1>
        <form action="{{ url('/cart/' . $cartId) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" value="{{ $cartEntry->quantity }}" required>

            <button type="submit">Update Cart</button>
        </form>
    </div>
@endsection
