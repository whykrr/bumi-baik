<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculatorRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "fuel" => [
                "required",
                "numeric",
                "min:0",
            ],
            "fuel_type" => [
                "required",
            ],
            "electricity" => [
                "required",
                "numeric",
                "min:0",
            ],
            "electricity_type" => [
                "required",
            ],
            "gas" => [
                "required",
                "numeric",
                "min:0",
            ],
            "gas_type" => [
                "required",
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
            "fuel.required" => "BBM harus diisi",
            "fuel.numeric" => "BBM harus berupa angka",
            "fuel.min" => "BBM minimal 0",
            "fuel_type.required" => "Jenis BBM harus diisi",
            "electricity.required" => "Penggunaan listrik harus diisi",
            "electricity.numeric" => "Penggunaan listrik harus berupa angka",
            "electricity.min" => "Penggunaan listrik minimal 0",
            "electricity_type.required" => "Jenis penggunaan listrik harus diisi",
            "gas.required" => "Penggunaan gas harus diisi",
            "gas.numeric" => "Penggunaan gas harus berupa angka",
            "gas.min" => "Penggunaan gas minimal 0",
            "gas_type.required" => "Jenis penggunaan gas harus diisi",
        ];
    }
}
