<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStokRequest extends FormRequest
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
            'menu_id' => ['required', 'max:50', 'string'],
            'jumlah' => ['required', 'max:50', 'string'],
            
        ];
        
    }

    public function messages(){
        return[
            'menu_id.required' => 'Data nama stok belum diisi!',
            'jumlah.required' => 'Data nama stok belum diisi!', 
        ];
    }
}
