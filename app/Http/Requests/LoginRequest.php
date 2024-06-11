<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
//             Potential validation - FOO|BAR|BAZ could be stored in a config file
//            'login' => ['required', 'string', 'regex:/^(FOO|BAR|BAZ)_[a-zA-Z0-9]+$/'],
//            'password' => ['required', 'string'],
        ];
    }
}
