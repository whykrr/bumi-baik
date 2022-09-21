<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPassRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "old_password" => [
                "required",
                "min:8",
            ],
            "new_password" => [
                "required",
                "min:8",
            ],
            "new_password_confirm" => [
                "required",
                "min:8",
                "same:new_password"
            ],
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
            "old_password.required" => "Password lama harus diisi",
            "old_password.min" => "Password lama minimal 8 karakter",
            "new_password.required" => "Password baru harus diisi",
            "new_password.min" => "Password baru minimal 8 karakter",
            "new_password_confirm.required" => "Konfirmasi password harus diisi",
            "new_password_confirm.min" => "Konfirmasi password minimal 8 karakter",
            "new_password_confirm.same" => "Konfirmasi password tidak sama dengan password baru",
        ];
    }
}
