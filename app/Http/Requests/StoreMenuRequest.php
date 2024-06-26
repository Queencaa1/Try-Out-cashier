<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
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
            'nama_menu' => ['required', 'max:50', 'string'],
            'harga' => ['required', 'max:50', 'string'],
            'image' => ['required', 'image'],
            'deskripsi' => ['required', 'max:50', 'string'],
            'jenis_id' => ['required', 'max:20', 'string'],
            
        ];
        
    }

    public function messages(){
        return[
            'nama_menu.required' => 'Data nama menu belum diisi!',
            'harga.required' => 'Data nama menu belum diisi!',
            'image.required' => 'Data nama menu belum diisi!',
            'deskripsi.required' => 'Data nama menu belum diisi!',
            'jenis_id.required' => 'Data nama menu belum diisi!', 
        ];
    }
}
