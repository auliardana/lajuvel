<!-- resources/views/admin/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Edit Product</h2>
            <form action="{{ route('admin.products.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" name="category" id="category" class="form-control" value="{{ $product->category }}" required>
                </div>

                <div class="form-group">
                    <label for="size">Size</label>
                    <input type="text" name="size" id="size" class="form-control" value="{{ $product->size }}" required>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
                </div>

                <div class="form-group">
                    <label for="stock">Quantity</label>
                    <input type="number" name="stock" id="stock" class="form-control" value="{{ $product->stock }}" required>
                </div>

                <div class="form-group">
                    <img src="{{ asset('fotoproduk/' . $product->link_gambar) }}" alt="{{ $product->name }}" style="max-width: 100px;">
                    <label for="link_gambar">Image Upload</label>
                    <input type="file" name="link_gambar" id="link_gambar" class="form-control-file">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" required>{{ $product->description }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </div>
    </div>
</div>
@endsection
