<?php

namespace App\Helpers;

class Formatter
{
    // Format number to IDR
    public static function rupiah($value)
    {
        return "Rp " . number_format($value, 0, ",", ".");
    }

    /**
     * Reformat phone number to 62xxxxxxxxxx
     */
    // public static function IDTel($value)
    // {

    // }


    public static function IDTel($value)
    {
        $value = str_replace(" ", "", $value);
        $value = str_replace("-", "", $value);
        $value = str_replace("+", "", $value);
        $value = str_replace("(", "", $value);
        $value = str_replace(")", "", $value);
        // find the first number
        $firstNumber = strpos($value, "0");
        if ($firstNumber === 0) {
            $value = "62" . substr($value, 1);
        }
        return $value;
    }
}
