<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePemesananRequest extends FormRequest
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
            'meja_id' => ['required', 'max:50', 'string'],
            'tanggal_pemesanan' => ['required', 'max:50', 'string'],
            'jam_mulai' => ['required', 'max:50', 'string'],
            'jam_selesai' => ['required', 'max:50', 'string'],
            'nama_pemesan' => ['required', 'max:50', 'string'],
            'jumlah_pelanggan' => ['required', 'max:50', 'string'],
            
        ];
        
    }

    public function messages(){
        return[
            'meja_id.required' => 'Data nama pemesanan belum diisi!',
            'tanggal_pemesanan.required' => 'Data nama pemesanan belum diisi!',
            'jam_mulai.required' => 'Data nama pemesanan belum diisi!',
            'jam_selesai.required' => 'Data nama pemesanan belum diisi!',
            'nama_pemesan.required' => 'Data nama pemesanan belum diisi!',
            'jumlah_pelanggan.required' => 'Data nama pemesanan belum diisi!',
              
        ];
    }
}
