<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPembimbingRequest extends FormRequest
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
            'pengajuan_id' => ['nullable', 'exists:pengajuan_pklmagang,id'],
            'pegawai_id' => ['required', 'exists:pegawai,id'],
            'tahun' => ['required', 'string'],
        ];
    }
}   
