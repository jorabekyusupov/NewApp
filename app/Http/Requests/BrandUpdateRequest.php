<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
