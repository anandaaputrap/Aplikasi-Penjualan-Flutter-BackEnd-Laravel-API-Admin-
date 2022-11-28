<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiModel extends Model
{
    public $table = 'detail_transaksi';
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'users_id',
        'produk_id',
        'transaksi_id',
        'quantity',
    ];
    public function product()
    {
        return $this->hasOne(ProdukModel::class,'id','produk_id');
    }
    // public function transaksi()
    // {
    //     return $this->hasOne(TransaksiModel::class);
    // }
}
