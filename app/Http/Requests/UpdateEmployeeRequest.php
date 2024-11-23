<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Tentukan apakah pengguna diberi izin untuk melakukan request ini.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Atur menjadi false jika hanya admin yang boleh mengakses
    }

    /**
     * Tentukan aturan validasi yang diterapkan pada request ini.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->route('employee')->user->id,
            'status' => 'required', // Jika status menggunakan enum
            'birth_of_date' => 'required|date|before_or_equal:today',
            'city' => 'required|string|max:255',
        ];
    }

    /**
     * Tentukan pesan kesalahan yang digunakan untuk validasi.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be a valid email address.',
            'status.required' => 'Status is required.',
            'birth_of_date.required' => 'Birth of date is required.',
            'birth_of_date.before_or_equal' => 'Birth of date must be today or in the past.',
            'city.required' => 'City is required.',
        ];
    }
}
