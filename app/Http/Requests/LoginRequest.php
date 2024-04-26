<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
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
            'email' => 'required|max:150|email',
            'password' => 'required|min:5|max:20',
        ];
    }

    /**
     * Get custom attribute names for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'email' => 'email',
            'password' => 'mật khẩu',
        ];
    }

    /**
     * Get the custom messages for validation errors.
     *
     * @return array<string, string> Custom error messages for validation rules
     */
    public function messages()
    {
        return [];
    }
}
