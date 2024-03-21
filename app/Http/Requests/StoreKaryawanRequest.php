<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKaryawanRequest extends FormRequest
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
            'nip' => ['required', 'max:50', 'string'],
            'nik' => ['required', 'max:50', 'string'],
            'nama' => ['required', 'max:50', 'string'],
            'jenis_kelamin' => ['required', 'max:50', 'string'],
            'tempat_lahir' => ['required', 'max:20', 'string'],
            'tanggal_lahir' => ['required', 'max:50', 'string'],
            'telpon' => ['required', 'max:50', 'string'],
            'agama' => ['required', 'max:50', 'string'],
            'status_nikah' => ['required', 'max:50', 'string'],
            'alamat' => ['required', 'max:50', 'string'],
            // 'foto' => ['required', 'max:50', 'foto'],
            
        ];
        
    }

    public function messages(){
        return[
            'nip.required' => 'Data nama karyawan belum diisi!',
            'nik.required' => 'Data nama karyawan belum diisi!',
            'nama.required' => 'Data nama karyawan belum diisi!',
            'jenis_kelamin.required' => 'Data nama karyawan belum diisi!',
            'tempat_lahir.required' => 'Data nama karyawan belum diisi!',
            'tanggal_lahir.required' => 'Data nama karyawan belum diisi!',
            'telpon.required' => 'Data nama karyawan belum diisi!',
            'agama.required' => 'Data nama karyawan belum diisi!',
            'status_nikah.required' => 'Data nama karyawan belum!',
            'alamat.required' => 'Data nama karyawan belum!',
            // 'foto.required' => 'Data nama karyawan belum!'   
        ];
    }
}
