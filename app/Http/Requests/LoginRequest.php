<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "user" => [
                "required",
                "string",
                "min:3",
            ],
            "password" => "required"
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            "user.required" => "Username harus diisi",
            "user.string" => "Username harus berupa string",
            "user.min" => "Username minimal 3 karakter",
            "password.required" => "Password harus diisi"
        ];
    }
}
