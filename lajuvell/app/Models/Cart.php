<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'productId',
        'quantity',
        'price',
        'total_price',
        'is_checked_out',
        'checkeout_date',
        'shipping_address',
    ];
    protected $table = 'carts'; // Specify the table name if not using the default Laravel convention

    // Define the relationship between Cart and User (assuming one-to-many relationship)
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    // Define the relationship between Cart and Product (assuming one-to-many relationship)
    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }

    // Define any other model-specific methods or attributes here
}
