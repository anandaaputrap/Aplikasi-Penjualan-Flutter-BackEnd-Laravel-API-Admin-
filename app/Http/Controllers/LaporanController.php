<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksiModel;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Models\TransaksiModel;


class LaporanController extends Controller
{
    public function printAllReport()
    {
        $data = TransaksiModel::all();

        return view('pages.dashboard.transaksi.print', [
            'data' => $data,
            'title' => 'Laporan_Semua_Transaksi'
        ]);
    }

    // public function printByUser($id)
    // {
    //     $trans = TransaksiModel::find($id);
    //     $detail = TransaksiModel::with(['items.product'])->where(['transaksi_id', $id])->get();
    //     return view('pages.dashboard.transaksi.invoice', [
    //         'trans' => $trans,
    //         'detail' => $detail,
    //     ]);        
    // }

    public function printUserReport($id)
    {
        $transaction = TransaksiModel::find($id);
        $items = DetailTransaksiModel::with(['product'])->where('transaksi_id', $id)->get();

        return view('pages.dashboard.transaksi.invoice', [
            'transaction' => $transaction,
            'item' => $items,
            'title' => 'Laporan_Semua_Transaksi',
        ]);
    }
}
