<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProdukKategoriModel;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;

class ProdukKategoriController extends Controller
{
    public function all(Request $r)
    {
        $id = $r->input('id');
        $batas = $r->input('batas');
        $nama = $r->input('id');
        $tampilproduk = $r->input('tampilproduk');

        if($id)
        {
            $kategori = ProdukKategoriModel::with(['products'])->find($id);

            if($kategori)
            {
                return ResponseFormatter::success($kategori, 'Data Kategori Berhasil Diambil');
            }
            else
            {
                return ResponseFormatter::error(null, 'Data Kategori Tidak Ditemukan', 404);
            }
        }
        $kategori = ProdukKategoriModel::query();
        if($nama)
        {
            $kategori->where('nama_kategori', 'like', '%' . $nama . '%');
        }
        if($tampilproduk)
        {
            $kategori->with('products');
        }
        return ResponseFormatter::success
        ($kategori->paginate($batas), 'Data Kategori Berhasil Diambil');
    }
}
