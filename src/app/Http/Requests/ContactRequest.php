<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
        ];
    }

    public function messages()
    {
    return [
        'name.required' => '名前は必須項目です。',
        'name.string' => '名前を文字列で入力してください',
        'name.max' => '名前を255文字以下で入力してください',
        'email.required' => 'メールアドレスは必須項目です。',
        'email.string' => 'メールアドレスを文字列で入力してください',
        'email.email' => '有効なメールアドレスを入力してください。',
        'email.max' => 'メールアドレスを255文字以下で入力してください',
        'category_id.required' => 'カテゴリは必須項目です。',
        'category_id.exists' => '選択されたカテゴリは無効です。',
        'content.required' => '内容は必須項目です。',
        'content.string' => '内容を文字列で入力してください',
    ];
    }
}
