<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdukKategoriModel extends Model
{
    protected $table = 'produk_kategori';
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nama_kategori',
    ];
    public function products()
    {
        return $this->hasMany(ProdukModel::class,'kategori_id','id');
    }
}
