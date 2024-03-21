<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransaksiRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'tanggal' => ['required', 'max:50', 'string'],
            'total_harga' => ['required', 'max:50', 'string'],
            'metode_pembayaran' => ['required', 'max:50', 'string'],
            'keterangan' => ['required', 'max:50', 'string'],
            
        ];
        
    }

    public function messages(){
        return[
            'tanggal.required' => 'Data nama karyawan belum diisi!',
            'total_harga.required' => 'Data nama karyawan belum diisi!',
            'metode_pembayaran.required' => 'Data nama karyawan belum diisi!',
            'keterangan.required' => 'Data nama karyawan belum diisi!',
        ];
    }
}
