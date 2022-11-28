<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\ProdukModel;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function all(Request $r)
    {
        $id = $r->input('id');
        $batas = $r->input('batas', 6);
        $nama = $r->input('id');
        $deskripsi = $r->input('deskripsi');
        $tags = $r->input('tags');
        $kategori = $r->input('kategori');
        $stok = $r->input('stok_produk');

        $hargadari = $r->input('hargadari');
        $hargake = $r->input('hargake');

        if($id)
        {
            $produk = ProdukModel::with(['category', 'galleries'])->find($id);

            if($produk)
            {
                return ResponseFormatter::success($produk, 'Data Produk Berhasil Diambil');
            }
            else
            {
                return ResponseFormatter::error(null, 'Data Produk Tidak Ditemukan', 404);
            }
        }
        $produk = ProdukModel::with(['category', 'galleries']);

        if($nama)
        {
            $produk->where('nama_produk', 'like', '%' . $nama . '%');
        }
        if($deskripsi)
        {
            $produk->where('deskripsi', 'like', '%' . $deskripsi . '%');
        }
        if($tags)
        {
            $produk->where('tags', 'like', '%' . $tags . '%');
        }
        if($stok)
        {
            $produk->where('stok_produk', 'like', '%' . $stok . '%');
        }
        if($hargadari)
        {
            $produk->where('harga', '>=', $hargadari);
        }
        if($hargake)
        {
            $produk->where('harga', '<=', $hargake);
        }
        if($kategori)
        {
            $produk->where('kategori', $kategori);
        }
        return ResponseFormatter::success
        ($produk->paginate($batas), 'Data Produk Berhasil Diambil');
    }
}
