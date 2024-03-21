<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMejaRequest extends FormRequest
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
            'nomor_meja' => ['required', 'max:50', 'string'],
            'kapasitas' => ['required', 'max:50', 'string'],
            'status' => ['required', 'max:50', 'string'],
            
        ];
        
    }

    public function messages(){
        return[
            'nomor_meja.required' => 'Data nama karyawan belum diisi!',
            'kapasitas.required' => 'Data nama karyawan belum diisi!',
            'status.required' => 'Data nama karyawan belum diisi!', 
        ];
    }
}
