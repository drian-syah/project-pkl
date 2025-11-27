<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTambahBidangRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:100', 'unique:bidangs,nama'],
            'kode' => ['required', 'string', 'max:20', 'unique:bidangs,kode'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama bidang wajib diisi.',
            'nama.unique'   => 'Nama bidang sudah ada, tidak boleh duplikat.',
            
            'kode.required' => 'Kode bidang wajib diisi.',
            'kode.unique'   => 'Kode bidang sudah ada, tidak boleh duplikat.',
        ];
    }
}
