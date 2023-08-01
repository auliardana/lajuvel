@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <p class="card-text">Manage registered users.</p>
                    {{-- <a href="{{ route('users.index') }}" class="btn btn-primary">View Users</a> --}}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Products</h5>
                    <p class="card-text">Manage products in the catalog.</p>
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
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>Rp.{{ $product->price }}</td>
                                            <td>{{ $product->stock }}</td>
                                            <td>
                                                @if($product->link_gambar)
                                                    <img src="{{ asset('fotoproduk/' . $product->link_gambar) }}" alt="{{ $product->name }}" style="max-width: 100px;">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>{{ $product->description}}</td>
                                            <td>
                                                <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('admin.products.destroy', ['product' => $product->id]) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">store products</a>
                </div>
            </div>
        </div>
        <!-- Add more cards for other sections of the dashboard as needed -->
    </div>
</div>
@endsection
