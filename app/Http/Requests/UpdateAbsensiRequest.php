<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAbsensiRequest extends FormRequest
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
            'namaKaryawan' => 'required|string',
            'tanggalMasuk' => 'required|date',
            'waktuMasuk' => 'required|time',
            'status' => 'required|in:masuk,izin,cuti',
            'waktuKeluar' => 'required|time'
        ];
    }
}
