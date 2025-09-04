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
                'nullable',
                function ($attribute, $value, $fail) {
                    if ($value && ! preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?$/', $value)) {
                        $fail('Format waktu tidak valid. Gunakan format HH:MM');
                    }
                },
            ],
        ];
    }
}
