<?php

namespace App\Http\Requests\users;

use Illuminate\Foundation\Http\FormRequest;

class KehilanganStoreRequest extends FormRequest
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
            'nama_barang' => [
                'required',
                'string',
                'max:50',
            ],
            'lokasi_hilang' => [
                'required',
                'string',
                'max:100',
            ],
            'deskripsi' => [
                'required',
                'string',
                'max:1000',
            ],
            'tanggal_hilang' => [
                'required',
                'date',
                'before_or_equal:today',
            ],
            'foto' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,svg,gif',
                'max:2048', // 2 MB
            ],
        ];
    }
}
