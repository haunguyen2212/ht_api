<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|max:100',
            'slug' => 'required|max:100|unique:posts,slug',
            'excerpt' => 'nullable|max:1000',
            'content' => 'required|max:10000',
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
            'title' => 'tiêu đề bài viết',
            'slug' => 'slug bài viết',
            'excerpt' => 'trích đoạn bài viết',
            'content' => 'nội dung bài viết'
        ];
    }
}
