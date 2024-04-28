<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAbsensiRequest extends FormRequest
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
            'namaKaryawan' => ['required', 'max:50', 'string'],
            'tanggalMasuk' => ['required', 'date'],
            'waktuMasuk' => ['required'],
            'status' => ['required'],
            'waktuKeluar' => ['required'],
         
        ];
        
    }

    public function messages(){
        return[
            'namaKaryawan.required' => 'Data nama karyawan belum diisi!',
            'tanggalMasuk.required' => 'tanggal masuk karyawan belum diisi!',
            'waktuMasuk.required' => 'waktu masuk karyawan belum diisi!',
            'status.required' => 'status karyawan belum diisi!',
            'waktuKeluar.required' => 'waktu Keluar karyawan belum diisi!',
        ];
    }
}
