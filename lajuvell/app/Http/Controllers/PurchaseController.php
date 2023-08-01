<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function showPaymentForm()
    {
        // You can customize this method to display a payment form with required data
        return view('payment.payment_form');
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'total_price' => 'required|numeric|min:0',
            'metode_pembayaran' => 'required|string',
            'nama_pengirim' => 'required|string',
            'norek_pengirim' => 'required|string',
            'nomor_transaksi' => 'required|string',
        ]);

        // Create a new purchase record
        $purchase = Purchase::create([
            'total_price' => $request->input('total_price'),
            'metode_pembayaran' => $request->input('metode_pembayaran'),
            'nama_pengirim' => $request->input('nama_pengirim'),
            'norek_pengirim' => $request->input('norek_pengirim'),
            'nomor_transaksi' => $request->input('nomor_transaksi'),
        ]);

        // You can add any additional logic or payment processing here

        // Redirect to a success page or show a success message
        return redirect()->route('payment.success')->with('success', 'Payment successful. Thank you for your purchase!');
    }
}
