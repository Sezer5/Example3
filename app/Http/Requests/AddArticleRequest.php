<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class AddArticleRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:1|max:255|unique:articles',
            'desc' => 'required|min:1|max:5000',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            'thumbnail.max' => 'Thumbnail must be less than 2Mb'
        ];
    }
}
