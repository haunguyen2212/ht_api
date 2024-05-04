<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'required|min:5|max:30',
            'email' => 'required|max:150|email|unique:users,email',
            'password' => 'required|min:5|max:20',
            'confirmPassword' => 'nullable|required_with:password|min:5|max:20|same:password',
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
            'username' => 'tên tài khoản',
            'email' => 'email',
            'password' => 'mật khẩu',
            'confirmPassword' => 'mật khẩu xác nhận',
        ];
    }

    /**
     * Get the custom messages for validation errors.
     *
     * @return array<string, string> Custom error messages for validation rules
     */
    public function messages()
    {
        return [
            'confirmPassword.same' => 'Mật khẩu xác nhận không trùng khớp'
        ];
    }

}
