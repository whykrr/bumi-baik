<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Helpers\Formatter;
use App\Constants\ResponseMessage;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserRequest;
use Propaganistas\LaravelPhone\PhoneNumber;
use App\Http\Requests\UpdateUserPassRequest;

class UserController extends Controller
{
    /**
     * Login user and create token
     * 
     */

    public function login(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->user,
            'password' => $request->password
        ];

        if (!$token = auth('api')->attempt($credentials)) {
            // check with phone
            $credentials = [
                'telp' => Formatter::IDTel(PhoneNumber::make($request->user, ['ID'])),
                'password' => $request->password
            ];
            if (!$token = auth('api')->attempt($credentials)) {
                return response()->json(['message' => ResponseMessage::ERROR_UNAUTHORIZED], 401);
            }
        }

        $user = auth('api')->user();
        // remove gender, birth_date, address, email_verified_at, created_at, updated_at
        unset($user->gender);
        unset($user->birth_date);
        unset($user->address);
        unset($user->email_verified_at);
        unset($user->created_at);
        unset($user->updated_at);

        // get token with refresh_ttl
        $refreshToken = auth('api')->setTTL(86400)->attempt($credentials);

        return response()->json([
            "message" => ResponseMessage::SUCCESS_LOGIN,
            "data" => [
                "access_token" => $token,
                "refresh_token" => $refreshToken,
                "user" => $user
            ]
        ]);
    }

    /**
     * Register user
     *  
     * @param RegisterRequest $request
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telp' => Formatter::IDTel($request->telp),
            'email_verified_at' => now(),
            'password' => bcrypt($request->password)
        ]);

        // login 
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $token = auth('api')->attempt($credentials);

        // remove gender, birth_date, address, email_verified_at, created_at, updated_at
        unset($user->gender);
        unset($user->birth_date);
        unset($user->address);
        unset($user->email_verified_at);
        unset($user->created_at);
        unset($user->updated_at);

        $refreshToken = auth('api')->setTTL(86400)->attempt($credentials);

        return response()->json([
            "message" => ResponseMessage::SUCCESS_REGISTER,
            "data" => [
                "access_token" => $token,
                "refresh_token" => $refreshToken,
                "user" => $user
            ]
        ]);
    }

    /**
     * genrate new access_token and refresh_token form refresh_token
     */
    public function refresh()
    {
        $id = auth('api')->user()->id;

        $token = auth('api')->tokenById($id);
        $refreshToken = auth('api')->setTTL(86400)->tokenById($id);

        return response()->json([
            "message" => ResponseMessage::SUCCESS_RETRIEVE,
            "data" => [
                "access_token" => $token,
                "refresh_token" => $refreshToken,
            ]
        ]);
    }

    /**
     * Logout 
     */
    public function logout()
    {
        // remove token
        auth('api')->logout(true);

        return response()->json([
            "message" => ResponseMessage::SUCCESS_LOGOUT,
        ]);
    }

    /**
     * Get user Detail
     */
    public function detail()
    {
        $id = auth('api')->user()->id;

        $user = User::find($id);

        // return user detail
        return response()->json([
            "message" => ResponseMessage::SUCCESS_RETRIEVE,
            "data" => $user
        ]);
    }

    /**
     * Update data user
     */
    public function update(UpdateUserRequest $request)
    {
        // update user
        $user = User::findOrFail(auth('api')->user()->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->telp = $request->telp;
        $user->birth_date = $request->birth_date;
        $user->gender = $request->gender;

        $user->save();

        // return user detail
        return response()->json([
            "message" => ResponseMessage::SUCCESS_UPDATE,
            "data" => $user
        ]);
    }

    /**
     * Update password user
     */
    public function edit_password(UpdateUserPassRequest $request)
    {
        // update user
        $user = User::findOrFail(auth('api')->user()->id);

        // check old password
        if ($request->new_password == $request->old_password) {
            return response()->json([
                "message" => ResponseMessage::ERROR_VALIDATION,
                "errors" => [
                    "new_password" => [
                        "Password lama tidak boleh sama dengan password baru"
                    ]
                ]
            ], 400);
        }

        // check old password
        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json([
                "message" => ResponseMessage::ERROR_VALIDATION,
                "errors" => [
                    "old_password" => [
                        "Password lama tidak sesuai"
                    ]
                ]
            ], 400);
        }

        $user->password = bcrypt($request->new_password);

        $user->save();

        // return user detail
        return response()->json([
            "message" => ResponseMessage::SUCCESS_UPDATE,
            "data" => $user
        ]);
    }
}