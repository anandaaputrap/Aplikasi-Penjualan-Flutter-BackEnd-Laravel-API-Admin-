<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdukRequest;
use App\Models\ProdukKategoriModel;
use App\Models\ProdukModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProdukkController extends Controller
{
    
    // 
    public function index(){ 
 

    return view('pages.dashboard.produk.index', [ 
        'data' => ProdukModel::with('category')->get(),
        ]); 
    }

  
    public function create()
    {
        $categories = ProdukKategoriModel::all();
        return view('pages.dashboard.produk.create', compact('categories'));
    }

   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required',
            'tags' => 'required',
            'kategori_id' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|min:2',
            'stok_produk' => 'required|min:1',
        ]);

        $pro = [
            'nama_produk' => $validatedData['nama_produk'],
            'harga' => $validatedData['harga'],
            'deskripsi' =>$validatedData['deskripsi'],
            'tags' =>$validatedData['tags'],
            'stok_produk' =>$validatedData['stok_produk'],
            'kategori_id' =>$validatedData['kategori_id'],
        ];

        ProdukModel::create($pro);
        return redirect()->route('dashboard.produk.index');
    }

    
    public function show($id)
    {
        //
    }


    public function edit(ProdukModel $produk)
    {
        $categories = ProdukKategoriModel::all();
        return view('pages.dashboard.produk.edit',[
            'item' => $produk,
            'categories' => $categories
        ]);
    }

    public function update(ProdukRequest $request, ProdukModel $produk)
    {
        $data = $request->all();

        $produk->update($data);

        return redirect()->route('dashboard.produk.index');
    }

    public function destroy(ProdukModel $produk)
    {
        $produk->delete();

        return redirect()->route('dashboard.produk.index');
    }
}
