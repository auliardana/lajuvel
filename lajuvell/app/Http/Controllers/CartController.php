<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function create()
    {
        return view('cart.addToCart');
    }

    public function addToCart(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'quantity' => 'required|integer|min:1',
            'price' => 'required',
            'shipping_address' => 'required|string'
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
    
        $quantity = $request->input('quantity');
        $price = $request->input('price');
        $shippingAddress = $request->input('shipping_address');
    
        // Get the logged-in user
        $user = auth()->user();
    
        // Find the product
        $product = Product::findOrFail($request->productId);
    
        // Calculate total price
        $totalPrice = $price * $quantity;
    
        // Create a new cart entry
        $cart = new Cart([
            'productId' => $request->productId,
            'userId' => $user->id,
            'quantity' => $quantity,
            'price' => $price,
            'total_price' => $totalPrice,
            'is_checked_out' => false,
            'checkout_date' => null,
            'shipping_address' => $shippingAddress,
        ]);
    
        // Save the cart entry for the user and product
        $user->carts()->save($cart);
        $product->carts()->save($cart);
    
        // Redirect to cart view with success message
        return back()->with('success', 'Product added to cart successfully');
    
    }

    public function viewCart(Request $request)
    {
        $userId = $request->input('user_id');
        // You may also want to validate input data here

        // Find the user and their cart entries
        $user = User::findOrFail($userId);
        $cartEntries = $user->carts;

        // You can format the cart entries or return them as needed
        return view('viewCart', compact('cartEntries'));
    }

    public function updateCart(Request $request, $cartId)
    {
        $quantity = $request->input('quantity');
        // You may also want to validate input data here

        // Find the cart entry
        $cart = Cart::findOrFail($cartId);

        // Update quantity and total price
        $cart->quantity = $quantity;
        $cart->total_price = $cart->price * $quantity;
        $cart->save();

        // You can add any additional logic or response here if needed
        return response()->json(['message' => 'Cart updated successfully']);
    }

    public function removeFromCart($cartId)
    {
        // Find the cart entry
        $cart = Cart::findOrFail($cartId);

        // Delete the cart entry
        $cart->delete();

        // You can add any additional logic or response here if needed
        return response()->json(['message' => 'Product removed from cart successfully']);
    }
}
