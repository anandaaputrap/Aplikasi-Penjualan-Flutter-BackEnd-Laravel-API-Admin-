<?php

namespace App\Http\Controllers;


// use PDF;
// use Barryvdh\DomPDF\PDF;
use App\Models\TransaksiModel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DetailTransaksiModel;
use App\Http\Requests\TransaksiRequest;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class TransaksiController extends Controller
{
    
    // public function index()
    // {
    //     if (request()->ajax()) {
    //         $query = TransaksiModel::with(['user']);

    //         return DataTables::of($query)
    //             ->addColumn('action', function ($item) {
    //                 return '
    //                     <a class="inline-block border border-blue-700 bg-blue-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-blue-800 focus:outline-none focus:shadow-outline" 
    //                         href="' . route('dashboard.transaksi.show', $item->id) . '">
    //                         Detail
    //                     </a>
    //                     <a class="inline-block border border-gray-700 bg-gray-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline" 
    //                         href="' . route('dashboard.transaksi.edit', $item->id) . '">
    //                         Edit
    //                     </a>';
    //             })
    //             ->editColumn('total_harga', function ($item) {
    //                 return number_format($item->total_harga);
    //             })
    //             ->rawColumns(['action'])
    //             ->make();
            
            
    //     }

    //     return view('pages.dashboard.transaksi.index');
    // }

    public function index(){ 
        if (request()->getdate) { 
            $getdate = Carbon::parse(request()->getdate)->toDateTimeString(); 
            $data = TransaksiModel::with(['items.product'])->whereDate('created_at',$getdate)->get(); 
         
            } 
            else { 
                $getdate = Carbon::parse(request()->getdate)->toDateTimeString(); 
                 $data = TransaksiModel::with(['items.product'])->get(); 
            } 
     
            return view('pages.dashboard.transaksi.index', [ 
                'data'   =>  $data, 
                'getdate'  =>  $getdate, 
            ]); 
    }

    
    public function create()
    {
        //
    }

   
    public function store(TransaksiRequest $request)
    {
        //
    }

    
    public function show(TransaksiModel $transaksi)
    {
        if (request()->ajax()) {
            $query = DetailTransaksiModel::with(['product'])->where('transaksi_id', $transaksi->id);

            return DataTables::of($query)
                ->editColumn('product.price', function ($item) {
                    return number_format($item->product->harga);
                })
                ->make();
        }

        return view('pages.dashboard.transaksi.show', compact('transaksi'));
    }

    
    public function edit(TransaksiModel $transaksi)
    {
        return view('pages.dashboard.transaksi.edit',[
            'item' => $transaksi
        ]);
    }

    
    public function update(TransaksiRequest $request, TransaksiModel $transaksi)
    {
        $data = $request->all();

        $transaksi->update($data);

        return redirect()->route('dashboard.transaksi.index');
    }

    
    public function destroy(TransaksiModel $transaksi)
    {
        
    }

    public function cetak_pdf()
    {
    	$transaksi = TransaksiModel::all();
 
    	$pdf = PDF::loadview('dashboard.transaksi.show',['transaksi'=>$transaksi]);
    	return $pdf->download('laporantransaksi-pdf');
    }

    
}
