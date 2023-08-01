<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category',
        'size',
        'price',
        'stock',
        'link_gambar',
        'description',
    ];

    protected $table = 'products';


    // Define the relationship between Product and Order (assuming one-to-many relationship)
    public function carts()
    {
        return $this->hasMany(Cart::class, 'productId');
    }

}
