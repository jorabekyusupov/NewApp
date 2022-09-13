<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
            'description' => 'string',
            'price' => 'numeric',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
