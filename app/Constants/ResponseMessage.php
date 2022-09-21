<?php

namespace App\Constants;

/**
 * Class for get message responde
 */

class ResponseMessage
{
    // 2xx
    public const SUCCESS_LOGIN = "Login success";
    public const SUCCESS_REGISTER = "Registrasi success";
    public const SUCCESS_LOGOUT = "Logout success";
    public const SUCCESS_RETRIEVE = 'Data successfully retrieved';
    public const SUCCESS_CREATE = 'Data successfully created';
    public const SUCCESS_UPDATE = 'Data successfully updated';
    public const SUCCESS_DELETE = 'Data successfully deleted';

    // 4xx
    public const ERROR_VALIDATION = 'Validation error';
    public const ERROR_VOUCHER_USED = 'Voucher already used';
    public const ERROR_VOUCHER_CANT_USE = 'Voucher can not be used';
    public const ERROR_UNAUTHORIZED = 'User unauthorized';
    public const ERROR_FORBIDEN = 'User forbidden';
    public const ERROR_NOT_FOUND = 'Data not found';
    public const ERROR_TARGET_NOT_FOUND = 'Target not found';

    // 5xx
    public const ERROR = 'Error';
    public const ERROR_SERVER = 'Internal server error';
    public const ERROR_RETRIEVE = 'Data not retrieved';
}
