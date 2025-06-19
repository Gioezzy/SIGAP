<?php

namespace App\Http\Requests\users;

use Illuminate\Foundation\Http\FormRequest;

class KeramaianUpdateRequest extends FormRequest
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
                'sometimes',
                'required',
                'string',
                'max:100'
            ],
            'lokasi_acara' => [
                'sometimes',
                'required',
                'string',
                'max:100'
            ],
            'tanggal_acara' => [
                'sometimes',
                'required',
                'date'
            ],
            'waktu_acara' => [
                'sometimes',
                'required',
                'date_format:H:i'
            ],
        ];
    }
}
