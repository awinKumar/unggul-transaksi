<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function item_penjualan()
    {
        return $this->hasMany(ItemPenjualan::class);
    }

    public function barang()
    {
        return $this->hasOneThrough(ItemPenjualan::class, Barang::class);
    }
}
