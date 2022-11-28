<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProdukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_produk' => 'required|max:255',
            'deskripsi' => 'required',
            'harga' => 'required|integer',
            'kategori_id' => 'required|exists:produk_kategori,id',
            'stok_produk' => 'required|integer'
        ];
    }
}
