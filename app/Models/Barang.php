<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    public function sabar()
    {
        return $this->belongsTo(Sabar::class, 'kode_satuan');
    }

    public function kabar()
    {
        return $this->belongsTo(Kabar::class, 'kategori_barang');
    }
}
