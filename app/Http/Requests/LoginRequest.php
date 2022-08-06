<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:255', 'exists:users,username'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
