<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdukTitipanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_produk' => ['required', 'max:50', 'string'],
            'nama_supplier' => ['required', 'max:50', 'string'],
            'harga_beli' => ['required', 'max:50', 'string'],
            'harga_jual' => ['required', 'max:20', 'string'],
            'stok' => ['required', 'max:50', 'string'],
            'keterangan' => ['required', 'max:50', 'string'],
            
        ];
        
    }

    public function messages(){
        return[
            'nama_produk.required' => 'Data nama produk belum diisi!',
            'nama_supplier.required' => 'Data nama produk belum diisi!',
            'harga_beli.required' => 'Data nama produk belum diisi!',
            'harga_jual.required' => 'Data nama produk belum diisi!',
            'stok.required' => 'Data nama produk belum diisi!',
            'keterangan.required' => 'Data nama produk belum diisi!'
        ];
    }
}
