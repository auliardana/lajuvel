@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cart</h1>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartEntries as $cartEntry)
                    <tr>
                        <td>{{ $cartEntry->product->name }}</td>
                        <td>{{ $cartEntry->quantity }}</td>
                        <td>{{ $cartEntry->price }}</td>
                        <td>{{ $cartEntry->total_price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
