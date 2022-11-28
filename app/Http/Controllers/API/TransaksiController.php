<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\TransaksiModel;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\DetailTransaksiModel;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    // public function all(Request $r)
    // {
    //     $id = $r->input('id');
    //     $batas = $r->input('batas', 6);
    //     $status = $r->input('status');

    //     if($id)
    //     {
    //         $transaksi = TransaksiModel::with(['items.product'])->find($id);

    //         if($transaksi)
    //         {
    //             return ResponseFormatter::success(
    //                 $transaksi, 'Data Transaksi Berhasil Diambil');
    //         }
    //         else
    //         {
    //             return ResponseFormatter::error(
    //                 null, 'Data Transaksi Tidak Ditemukan', 404);
    //         }
    //     }

    //     $transaksi = TransaksiModel::with(['items.product'])->where('users_id', Auth::user()->id);

    //     if($status)
    //     {
    //         $transaksi->where('status', $status);
    //     }
    //     return ResponseFormatter::success(
    //         $transaksi->paginate($batas), 'Data List Transaksi Berhasil Diambil');
    // }
    public function all(Request $request, $user_id)
    {
        $id = $user_id;
        $status =$request->input('status');
        $limit = $request->input('limit', 100);

        if($id)
        {
            $transaction = TransaksiModel::where('users_id', $id)->get();

            if($transaction)
                return ResponseFormatter::success(
                    $transaction,
                    'Data Transaksi Berhasil Diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data Transaksi Gagal Diambil',
                    404
                );
        }

        $transaction = TransaksiModel::with(['items.product', 'product.galleries'])->where('users_id', Auth::user()->id);

        if($status)
            $transaction->where('status', $status);

        return ResponseFormatter::success(
            $transaction->paginate($limit),
            'Data List Transaksi Berhasil Diambil'
        );
    }
    public function checkout(Request $r)
    {
        $r->validate([
            'items' => 'required|array',
            'items.*.id' => 'exists:produk,id',
            'total_harga' => 'required',
            'biaya_kirim' => 'required',
            'status' => 'required|in:PENDING,SUKSES,BATAL,GAGAL,DIKIRIM,SAMPAI',
        ]);
        $transaksi = TransaksiModel::create([
            'users_id' => Auth::user()->id,
            'alamat' => $r->alamat,
            'total_harga' => $r->total_harga,
            'biaya_kirim' => $r->biaya_kirim,
            'status' => $r->status,
            'metode_pembayaran' => 'COD',
            // 'metode_pembayaran' => $r->input('metode_pembayaran'),
        ]);
        foreach($r->items as $produk)
        {
            DetailTransaksiModel::create([
                // 'users_id' => Auth::user()->id,
                'produk_id' => $produk['id'],
                'transaksi_id' => $transaksi->id,    
                'quantity' => $produk['quantity']
            ]);
        }
        return ResponseFormatter::success(
            $transaksi->load('items.product'), 'Transaksi Berhasil ');
    }
}
