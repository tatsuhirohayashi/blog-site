<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => ['required', 'max:40'],
            'content' => ['required', 'max:5000'],
            'image_url' => ['mimes:jpeg,jpg'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルを入力してください',
            'title.max' => 'タイトルは40字以内で入力してください',
            'content.required' => '本文を入力してください',
            'content.max' => '本文は5000字以内で入力してください',
            'image_url.mimes' => '画像の形式はjpegまたはjpgにしてください',
        ];
    }
}
