<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasukModel extends Model
{
    use HasFactory;
    public $table = 'barang_masuk';
    protected $guarded = ['id'];

    public function produk()
    {
        return $this->belongsTo(ProdukModel::class);
    }
}
