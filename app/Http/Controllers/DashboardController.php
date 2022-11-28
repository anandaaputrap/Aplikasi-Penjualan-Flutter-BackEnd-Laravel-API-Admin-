<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use App\Models\TransaksiModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        return view('dashboard', [
            'itung' => User::get(), 
            'itung1' => TransaksiModel::where('status', 'PENDING')->get(), 
            'itung2' => TransaksiModel::where('status', 'SUCCESS')->get(), 
            'itung3' => TransaksiModel::where('status', 'BATAL')->get(), 
            'itung4' => TransaksiModel::where('status', 'DIKIRIM')->get(), 
            'itung5' => TransaksiModel::where('total_harga')->get(), 

            'data6' => TransaksiModel::whereDate('created_at', Carbon::now())->get(),
            'produk' => ProdukModel::get() 
        ]);

    }
}
