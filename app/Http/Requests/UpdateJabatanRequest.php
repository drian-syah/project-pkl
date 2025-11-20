<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJabatanRequest extends FormRequest
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
            'nama_jabatan' => ['nullable', 'unique:jabatans,nama_jabatan', 'string', 'max:100']
        ];
    }

    public function messages(): array
    {
        return[
            'nama_jabatan.unique' => 'Jabatan sudah ada.'
        ];
    }
}
