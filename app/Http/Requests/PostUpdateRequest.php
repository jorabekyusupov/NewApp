<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['max:255'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'description' => ['string'],
            'sub_title' => ['string'],
            'category_id' => ['integer', 'exists:categories,id'],
        ];
    }
}
