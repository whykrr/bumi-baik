<?php

namespace App\Http\Requests;

use App\Helpers\Formatter;
use Illuminate\Foundation\Http\FormRequest;
use Propaganistas\LaravelPhone\PhoneNumber;

class UpdateUserRequest extends FormRequest
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
                "unique:users,email," . $this->user()->id
            ],
            "telp" => [
                "required",
                "phone:ID",
                "string",
                "min:10",
                "max:15",
                "unique:users,telp," . $this->user()->id
            ],
            "birth_date" => [
                "date",
            ],
            "gender" => [
                "string",
                "in:None,Male,Female"
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
            "birth_date.date" => "Tanggal lahir tidak valid",
            "gender.string" => "Jenis kelamin harus berupa string",
            "gender.in" => "Jenis kelamin tidak valid",
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
