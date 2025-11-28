<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPegawaiRequest extends FormRequest
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
            'nip' => ['required', 'string', 'unique:pegawai,nip'],
            'jabatan_id' => ['required', 'string', 'exists:jabatans,id'],
            'bidang_id' => ['required', 'string', 'exists:bidangs,id'],
        ];
    }

    public function messages(): array
    {
        return[
            'nip.required' => 'Nama tidak boleh kosong',
            'nip.unique' => 'Nama tidak boleh sama',
            'jabatan_id.required' => 'Jabatan wajib diisi',
            'bidang_id.required' => 'Bidang wajib diisi',
        ];
    }
}
