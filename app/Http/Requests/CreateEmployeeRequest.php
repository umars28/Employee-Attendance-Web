<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use App\Enums\StatusType;
use App\Enums\RoleType;

class CreateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'birth_of_date' => 'required|date|before:today',
            'city' => 'required|string|max:255',
            'status' => 'required',
        ];
    }

    /**
     * Custom messages for validation errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name must not exceed 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'birth_of_date.required' => 'The birth date field is required.',
            'birth_of_date.before' => 'The birth date must be before today.',
            'city.required' => 'The city field is required.',
            'city.max' => 'The city must not exceed 255 characters.',
            'status.required' => 'The status field is required.',
        ];
    }
}
