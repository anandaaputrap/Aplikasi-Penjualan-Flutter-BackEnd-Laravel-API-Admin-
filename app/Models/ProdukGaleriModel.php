<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdukGaleriModel extends Model
{
    use HasFactory, SoftDeletes;

    
    public $table = 'produk_galeri';
    protected $fillable = [
        'produk_id',
        'url',
        'is_featured'
    ];

    public function getUrlAttribute($url)
    {
        return config('app.url') . Storage::url($url);
    }
}
