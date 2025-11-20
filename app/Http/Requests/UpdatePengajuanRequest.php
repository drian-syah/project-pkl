<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePengajuanRequest extends FormRequest
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
            'sekolah_id' => ['required', 'exists:sekolahs,id'],
            'no_surat' => ['required', 'string', 'max:100'],
            'tgl_surat' => ['required', 'date'],
            'jumlah_siswa' => ['required', 'integer', 'min:1'],
            'periode_mulai' => ['required', 'date', 'before_or_equal:periode_selesai'],
            'periode_selesai' => ['required', 'date', 'after_or_equal:periode_mulai'],
            'file_surat_path' => ['nullable', 'file', 'mimes:pdf', 'max:5120'],
        ];
    }
}
