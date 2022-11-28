<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\ProdukGaleriRequest;
use App\Models\ProdukGaleriModel;
use App\Models\ProdukModel;

class ProdukGaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProdukModel $produk)
    {
        if (request()->ajax()) {
            $query = ProdukGaleriModel::where('produk_id', $produk->id);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <form class="inline-block" action="' . route('dashboard.galeri.destroy', $item->id) . '" method="POST">
                        <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                            Hapus
                        </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>';
                })
                ->editColumn('url', function ($item) {
                    return '<img style="max-width: 150px;" src="'. $item->url .'"/>';
                })
                ->editColumn('is_featured', function ($item) {
                    return $item->is_featured ? 'Yes' : 'No';
                })
                ->rawColumns(['action', 'url'])
                ->make();
        }

        return view('pages.dashboard.galeri.index', compact('produk'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProdukModel $produk)
    {
        return view('pages.dashboard.galeri.create', compact('produk'));
    }

    public function store(ProdukGaleriRequest $request, ProdukModel $produk)
    {
        $files = $request->file('files');

        if($request->hasFile('files'))
        {
            foreach ($files as $file) {
                $path = $file->store('public/gallery');

                ProdukGaleriModel::create([
                    'produk_id' => $produk->id,
                    'url' => $path
                ]);
            }
        }

        return redirect()->route('dashboard.produk.galeri.index', $produk->id);
    }

    
    public function show(ProdukGaleriModel $gallery)
    {
        //
    }

   
    public function edit(ProdukGaleriModel $gallery)
    {
        //
    }

    
    public function update(ProdukGaleriRequest $request, ProdukGaleriModel $gallery)
    {
        //
    }

    public function destroy(ProdukGaleriModel $galeri)
    {
        $galeri->delete();

        return redirect()->route('dashboard.produk.galeri.index', $galeri->produk_id);
    }
}
