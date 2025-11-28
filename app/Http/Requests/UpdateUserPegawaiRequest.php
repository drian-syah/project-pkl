<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPegawaiRequest extends FormRequest
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
            'user_id' => ['nullable', 'string', 'exists:users,id'],
            'nama' => ['required', 'string'],
            'nip' => ['nullable', 'string', 'unique:pegawai,nip'],
            'jabatan_id' => ['nullable', 'string', 'exists:jabatans,id'],
            'bidang_id' => ['nullable', 'string', 'exists:bidangs,id'],
        ];
    }
}
