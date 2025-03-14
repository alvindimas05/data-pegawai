<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiUpdateRequest extends FormRequest
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
            'id' => ['required', 'max:5'],
            'nama' => ['required', 'max:255'],
            'alamat' => ['required', 'max:255'],
            'no_telp' => ['required', 'max:30'],
            'email' => ['required', 'email'],
            'tanggal_masuk' => ['required', 'date'],
            'tanggal_keluar' => ['nullable', 'date'],
            'jabatan_id' => ['required', 'numeric', 'max:5']
        ];
    }
}
