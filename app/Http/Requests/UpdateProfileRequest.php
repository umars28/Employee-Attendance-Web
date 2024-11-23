<?php

namespace App\Http\Requests;

use App\Enums\RoleType;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
        $userId = Auth::id();
        $isAdmin = Auth::user()->role == RoleType::ADMIN;

        if ($isAdmin) {
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $userId,
                'password' => 'nullable|min:8|confirmed',
            ];
        }

        return [
            'name' => 'required|string|max:255',
            'birth_of_date' => 'required|date|before_or_equal:today', // Tambahkan validasi max hari ini
            'city' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $userId,
            'password' => 'nullable|min:8|confirmed',
        ];
    }

    /**
     * Customize error messages (optional).
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.unique' => 'The email is already taken.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
            'birth_of_date.required' => 'Birth of Date is required.',
            'birth_of_date.before_or_equal' => 'The birth date cannot be a future date.',
            'city.required' => 'City is required.',
        ];
    }
}
