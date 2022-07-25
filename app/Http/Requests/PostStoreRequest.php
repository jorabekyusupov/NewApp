<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['string', 'max:255', 'required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'description' => ['required', 'string'],
            'sub_title' => ['required', 'string'],
            'category_id' => ['required', 'integer', 'exists:categories,id']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
