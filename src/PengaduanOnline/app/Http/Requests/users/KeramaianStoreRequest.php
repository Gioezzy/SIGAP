<?php

namespace App\Http\Requests\users;

use Illuminate\Foundation\Http\FormRequest;

class KeramaianStoreRequest extends FormRequest
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
            'nama_acara' => [
                'required',
                'string',
                'max:100',
            ],
            'lokasi_acara' => [
                'required',
                'string',
                'max:100',
            ],
            'tanggal_acara' => [
                'required',
                'date',
            ],
            'waktu_acara' => [
                'required',
                'date_format:H:i',
            ],
        ];
    }
}
