<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJenisRequest extends FormRequest
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
            'nama_jenis' => ['required', 'max:50', 'string'],
            'kategory_id' => ['required', 'max:50', 'string'],
            
        ];
        
    }

    public function messages(){
        return[
            'nama_jenis.required' => 'Data nama jenis belum diisi!',
            'kategory_id.required' => 'Data nama jenis belum diisi!',   
        ];
    }
}
