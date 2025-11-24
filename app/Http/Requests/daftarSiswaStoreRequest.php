<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class daftarSiswaStoreRequest extends FormRequest
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
            'pengajuan_id' => ['required', 'exists:pengajuan_pklmagang,id'],
            'nama' => ['required', 'string', 'max:100'],
            'nisn' => ['required', 'string', 'unique:siswa_profile,nisn', 'max:30'],
            'kelas' => ['required', 'string', 'max:50'],
            'jurusan' => ['required', 'string', 'max:100'],
            'foto' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:5000']
        ];
    }

    public function messages(): array
    {
        return[
            'nama.required' => 'Nama wajib diisi.',
            'nisn.required' => 'NISN wajib diisi.',
            'nisn.unique' => 'NISN tidak boleh sama.',
            'kelas.required' => 'Kelas wajib diisi.',
            'jurusan.required' => 'Jurusan wajib diisi.',
            'foto.required' => 'Foto wajib diisi.',
            'foto.image' => 'Foto wajib gambar.',
        ];
    }
}
