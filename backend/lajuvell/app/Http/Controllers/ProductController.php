<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


// Add the necessary namespace at the top of the controller file
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Display a listing of the products.
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Show the form for creating a new product.
    public function create()
    {
        return view('admin.create');
    }

    // Store a newly created product in the database.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'size' => 'required|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'link_gambar' => 'required',
            'description' => 'required',
        ]);

        $data = Product::create($request->all());
        if($request->hasFile('link_gambar')){


            $randomFileName = Str::random(10) . '.' . $request->file('link_gambar')->getClientOriginalExtension();
            $request->file('link_gambar')->move('fotoproduk/', $randomFileName);
            $data->link_gambar = $randomFileName;
            $data->save();
        }
        return redirect()->route('admin.dashboard')
            ->with('success', 'Product created successfully.');
    }

    // Display the specified product.
    public function show(Product $product)
    {
        // Get the image URL based on the 'link_gambar' field in the product object
        $imageUrl = Storage::url('fotoproduk/' . $product->link_gambar);

        // Pass the product object and image URL to the 'products.show' view
        return view('products.show', [
            'product' => $product,
            'imageUrl' => $imageUrl
        ]);
    }

    // Show the form for editing the specified product.
    public function edit(Product $product)
    {
        return view('admin.edit', compact('product'));
    }

    // Update the specified product in the database.
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'size' => 'required',
            'price' => 'required|integer',
            'stock' => 'required',
            'link_gambar' => 'nullable', // Add validation for the image
            'description' => 'nullable',
        ]);
    
        // Handle image upload if a new image is provided
        if ($request->hasFile('link_gambar')) {
            // Get the original file name with extension
            $randomFileName = Str::random(10) . '.' . $request->file('link_gambar')->getClientOriginalExtension();
            
            // Generate a unique filename for the image
            $imagePath = $request->file('link_gambar')->storeAs($randomFileName);
            // Delete the old image if it exists
            if ($product->link_gambar) {
                unlink('fotoproduk/' . $product->link_gambar);
            }
            $product->link_gambar = $imagePath; // Update the link_gambar field with the new image filename
            $request->file('link_gambar')->move('fotoproduk/', $randomFileName);
        }
    
        // Update other fields of the product
        $product->update($request->except('link_gambar'));
    
        return redirect()->route('admin.dashboard')
            ->with('success', 'Product updated successfully.');
    }

    // Remove the specified product from the database.
    public function destroy(Product $product)
    {
        
        // Delete the image file from the public/fotoproduk folder
        if ($product->link_gambar) {
            unlink('fotoproduk/' . $product->link_gambar);
        }

        $product->delete();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Product deleted successfully.');
    }
}
