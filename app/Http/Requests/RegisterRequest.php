<?php

namespace App\Http\Requests;

use App\Helpers\Formatter;
use Illuminate\Foundation\Http\FormRequest;
use Propaganistas\LaravelPhone\PhoneNumber;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => [
                "required",
                "string",
                "min:3",
            ],
            "email" => [
                "required",
                "email",
                "unique:users,email"
            ],
            "telp" => [
                "required",
                "phone:ID",
                "string",
                "min:10",
                "max:15",
                "unique:users,telp"
            ],
            "password" => [
                "required",
                "string",
                "min:8",
            ],
            "password_confirm" => [
                "required",
                "string",
                "min:8",
                "same:password"
            ]
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
            "name.required" => "Nama harus diisi",
            "name.string" => "Nama harus berupa string",
            "name.min" => "Nama minimal 3 karakter",
            "email.required" => "Email harus diisi",
            "email.email" => "Email tidak valid",
            "email.unique" => "Email sudah terdaftar",
            "telp.required" => "Nomor telepon harus diisi",
            "telp.phone" => "Nomor telepon tidak valid",
            "telp.string" => "Nomor telepon harus berupa string",
            "telp.min" => "Nomor telepon minimal 10 karakter",
            "telp.max" => "Nomor telepon maksimal 15 karakter",
            "telp.unique" => "Nomor telepon sudah terdaftar",
            "password.required" => "Password harus diisi",
            "password.string" => "Password harus berupa string",
            "password.min" => "Password minimal 8 karakter",
            "password_confirm.required" => "Konfirmasi password harus diisi",
            "password_confirm.string" => "Konfirmasi password harus berupa string",
            "password_confirm.min" => "Konfirmasi password minimal 8 karakter",
            "password_confirm.same" => "Konfirmasi password tidak sama"
        ];
    }

    /**
     * Get Validator Instance
     */
    public function getValidatorInstance()
    {
        $this->IDTel();
        return parent::getValidatorInstance();
    }

    /**
     * Change the phone number format to be stored in the database
     */
    protected function IDTel()
    {
        $this->merge([
            'telp' => Formatter::IDTel(PhoneNumber::make($this->telp, ['ID']))
        ]);
    }
}
