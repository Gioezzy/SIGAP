<?php

namespace App\Http\Requests\users;

use Illuminate\Foundation\Http\FormRequest;

class AspirasiUpdateRequest extends FormRequest
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
            'judul' => [
                'required',
                'string',
                'max:50',
            ],
            'isi' => [
                'required',
                'string',
                'max:1000',
            ],
        ];
    }
}
