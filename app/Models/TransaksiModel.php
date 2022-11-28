<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'users_id',
        'alamat',
        'total_harga',
        'biaya_kirim',
        'status',
        'metode_pembayaran',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'users_id','id');
    }
    public function items()
    {
        return $this->hasMany(DetailTransaksiModel::class,'transaksi_id','id');
    }
}
