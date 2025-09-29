<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'first_name' => 'required|string|between:2,100',
            'last_name' => 'required|string|between:2,100',
            'phone' => 'nullable|string|size:11|unique:users',
            'email' => 'required|string|email|max:100|unique:users',
            'date_of_birth' => 'nullable|date',
            'password' => 'required|string|min:6',
            'user_type_id' => 'required|string|exists:user_types',
            'is_active' => 'nullable|boolean',
        ];
    }
}
