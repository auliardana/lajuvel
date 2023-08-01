<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'total_price',
        'metode_pembayaran',
        'nama_pengirim',
        'norek_pengirim',
        'nomor_transaksi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    
}
