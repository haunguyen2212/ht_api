<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

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
            'email' => 'required|max:150|email',
            'password' => 'required|min:5|max:20',
            'confirm_password' => 'required|same:password',
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
            'confirm_password.same' => 'mật khẩu xác nhận',
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
            'confirm_password.same' => 'Mật khẩu xác nhận không trùng khớp'
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @return void
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'errors' => $validator->errors()
        ], 422);

        throw new ValidationException($validator, $response);
    }
}
