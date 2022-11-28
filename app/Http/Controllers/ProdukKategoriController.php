<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdukKategoriRequest;
use App\Models\ProdukKategoriModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProdukKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            $query = ProdukKategoriModel::query();

            return DataTables::of($query)
            ->addColumn('action', function ($item) {
                return '<a class="inline-block border border-gray-700 bg-gray-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline" 
                            href="' . route('dashboard.kategori.edit', $item->id) . '">
                            Edit
                        </a>';
                    })
                    ->rawColumns(['action'])
                    ->make();
        }
        return view('pages.dashboard.kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.kategori.createkategori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdukKategoriRequest $request)
    {
        $data = $request->all();

        ProdukKategoriModel::create($data);

        return redirect()->route('dashboard.kategori.index')->with('Sukses', 'Data Nama Kategori Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProdukKategoriModel  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(ProdukKategoriModel $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdukKategoriModel  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdukKategoriModel $kategori)
    {
        return view('pages.dashboard.kategori.editkategori', [
            'item' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdukKategoriModel  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(ProdukKategoriRequest $request, ProdukKategoriModel $kategori)
    {
        $data = $request->all();
        $kategori->update($data);

        return redirect()->route('dashboard.kategori.index')->with('Sukses', 'Data Nama Kategori Berhasil Diubah'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdukKategoriModel  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdukKategoriModel $kategori)
    {
        $kategori->delete();
        return redirect()->route('dashboard.kategori.index')->with('Sukses', 'Data Nama Kategori Berhasil Dihapus'); 
    }
}
