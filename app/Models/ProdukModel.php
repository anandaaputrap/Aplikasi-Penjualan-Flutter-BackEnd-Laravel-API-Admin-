<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdukModel extends Model
{
    protected $table = 'produk';
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nama_produk',
        'harga',
        'deskripsi',
        'tags',
        'stok_produk',
        'kategori_id',
    ];
    public function galleries()
    {
        return $this->hasMany(ProdukGaleriModel::class,'produk_id','id');
    }
    public function category()
    {
        return $this->belongsTo(ProdukKategoriModel::class,'kategori_id','id');
    }
}
