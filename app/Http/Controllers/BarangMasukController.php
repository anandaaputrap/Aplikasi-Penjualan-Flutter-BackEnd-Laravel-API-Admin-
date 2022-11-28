<?php

namespace App\Http\Controllers;

use App\Models\BarangMasukModel;
use App\Models\ProdukKategoriModel;
use App\Models\ProdukModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangMasukController extends Controller
{
    public function index()
    {
        $data = BarangMasukModel::with(['produk'])->get();

        return view('pages.dashboard.barangmasuk.index', [
            'produk' => ProdukModel::all(),
            'kategori' => ProdukKategoriModel::all(),
            'data' => $data,
        ]);
    }

    public function create()
    {
        $produk = ProdukModel::all();
        return view('pages.dashboard.barangmasuk.create', compact('produk'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'produk_id' => 'required',
            'stok_masuk' => 'required',
            'tangal_masuk' => 'required',
         ]);

        //  $user =  Auth::user()->id;

         $bmasuk = [
            'produk_id' => $validatedData['produk_id'],
            'stok_masuk' => $validatedData['stok_masuk'],
            'tangal_masuk' =>$validatedData['tangal_masuk'],
            // 'users_id' => $user,
        ];

        
        // ProdukModel::find(['barangmasuk'])->where('id', $request->produk_id)->increment('stok', (int) $request->stok_masuk);
       
        $create = BarangMasukModel::create($bmasuk);
       
       
        ProdukModel::with(['barangmasuk'])->where('id', $create->produk_id)->increment('stok_produk', $create->stok_masuk);
        // $produk = Produk::find();
        // BarangMasuk::where('produk_id', $produk->id)->decrement('stok', $request->stok_masuk);
        return redirect(route('dashboard.barangmasuk.index'));
    }
}
