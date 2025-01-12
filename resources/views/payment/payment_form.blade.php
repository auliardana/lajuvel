@extends('layouts.app') <!-- Assuming you have a layout file (e.g., app.blade.php) that defines the common structure -->

@section('content')
    <div class="container">
        <h1>Payment Form</h1>
        <form action="{{ route('payment.process') }}" method="POST">
            @csrf

            <div class="form-group">
                
                <label for="total_price" >Total Price:</label>
                <input type="hidden" name="total_price" required value=300000>
            </div>

            <div class="form-group">
                <label for="metode_pembayaran">Payment Method:</label>
                <input type="text" name="metode_pembayaran" required>
            </div>

            <div class="form-group">
                <label for="nama_pengirim">Sender's Name:</label>
                <input type="text" name="nama_pengirim" required>
            </div>

            <div class="form-group">
                <label for="norek_pengirim">Sender's Account Number:</label>
                <input type="text" name="norek_pengirim" required>
            </div>

            <div class="form-group">
                <label for="nomor_transaksi">Transaction Number:</label>
                <input type="text" name="nomor_transaksi" required>
            </div>

            <button type="submit">Make Payment</button>
        </form>
    </div>
@endsection
